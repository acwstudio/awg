<?php

namespace App\Jobs;

use App\Category;
use App\Http\Resources\Category as ResourceCategory;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
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
        $shCategories = Category::all();

        do {
            $stCategories = json_decode($client->get($this->itemsURL)->getBody()->getContents(), true);
            dump($stCategories['meta']['offset'] . ' Categories');

            foreach ($stCategories['rows'] as $item) {

                $stCategory = ResourceCategory::make($item)->resolve();

                if ($shCategories->contains('st_id', $stCategory['st_id'])) {
                    $shCategories->where('st_id', $stCategory['st_id'])
                        ->first()
                        ->update($stCategory);
                } else {
                    Category::insert($stCategory);
                }

            }

            $this->itemsURL = isset($stCategories['meta']['nextHref']) ? $stCategories['meta']['nextHref'] : false;

        } while ($this->itemsURL);

        $shCategories->map(function ($item, $key) use ($shCategories) {
            if ($item['st_nested_id']) {
                /** @var Category $item */
                $category_id = $shCategories->where('st_id', $item['st_nested_id'])->first()->id;
                $item->update(['category_id' => $category_id]);
            }
        });
    }
}
