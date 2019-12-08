<?php

namespace App\Jobs;

use App\Category;
use App\Http\Resources\Category as ResourceCategory;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class PullCategory
 * @package App\Jobs
 */
class PullCategory implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 120;
    private $itemsURL;

    /**
     * Create a new job instance.
     *
     * @param string $itemsURL
     */
    public function __construct(string $itemsURL)
    {
        $this->itemsURL = $itemsURL;
    }

    /**
     * Execute the job.
     *
     * @param Client $client
     * @return void
     */
    public function handle(Client $client)
    {
        $shopCategories = Category::all();

        do {
            $storeCategories = json_decode($client->get($this->itemsURL)->getBody()->getContents(), true);

            foreach ($storeCategories['rows'] as $st_key => $row) {

                foreach ($shopCategories as $sh_key => $shopCategory) {

                    if ((string)$shopCategory->st_id === (string)$row['id']) {

                        if ((int)$shopCategory->st_version !== (int)$row['version']) {

                            $storeCategory = ResourceCategory::make($row)->resolve();
                            $shopCategory->update($storeCategory);
                        }

                        $shopCategories->forget($sh_key);
                        unset($storeCategories['rows'][$st_key]);
                    }

                }

            }

            if (count($storeCategories['rows'])) {
                foreach ($storeCategories['rows'] as $newRow) {

                    $storeCategory = ResourceCategory::make($newRow)->resolve();
                    Category::insertGetId($storeCategory);

                }
            }

            $this->itemsURL = isset($storeCategories['meta']['nextHref']) ? $storeCategories['meta']['nextHref'] : false;

        } while ($this->itemsURL);

        $shopCategories = Category::all();

        $shopCategories->map(function ($item, $key) use ($shopCategories) {
            if ($item['st_nested_id']) {
                /** @var Category $item */
                $category_id = $shopCategories->where('st_id', $item['st_nested_id'])->first()->id;
                $item->update(['category_id' => $category_id]);
            }
        });
    }
}
