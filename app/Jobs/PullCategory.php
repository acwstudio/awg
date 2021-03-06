<?php

namespace App\Jobs;

use App\Category;
use App\Http\Resources\Category as ResourceCategory;
use App\Product;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
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

    protected $url;
    protected $model;
    public $timeout = 120;

    /**
     * Create a new job instance.
     *
     * @param string $url
     * @param string $model
     */
    public function __construct(string $url, string $model)
    {
        $this->url = $url;
        $this->model = $model;
    }

    /**
     * Execute the job.
     *
     * @param Client $client
     * @return void
     */
    public function handle(Client $client)
    {
        $model = resolve($this->model);

        do {

            $storeItems = json_decode($client->get($this->url)->getBody()->getContents(), true);

            foreach ($storeItems['rows'] as $key => $item) {
                /** @var Builder $is_item */
                $is_item = $model->where('st_id', $item['id']);
                //dump($is_item->count() . ' ' . $item['id']);
                if ($is_item->count()) {
                    //$shop_id = $is_item->first()->id;
                    if ((int)$is_item->first()->st_version !== (int)$item['version']) {
                        $storeItem = ResourceCategory::make($item)->resolve();
                        $is_item->first()->update($storeItem);
                        info('updated ' . $storeItem['st_name'] . ' category');
                    }

                } else {

                    $storeItem = ResourceCategory::make($item)->resolve();
                    $model->insertGetId($storeItem);
                    info('added ' . $storeItem['st_name'] . ' category');

                }

            }

            $this->url = isset($storeItems['meta']['nextHref']) ? $storeItems['meta']['nextHref'] : false;

        } while ($this->url);

        if ($this->model === 'App\Category') {
            /** @var Collection $shopItems */
            $shopItems = $model->all();

            $shopItems->map(function ($item, $key) use ($shopItems) {
                // make relation category to products
                $products = Product::where('st_category_id', $item->st_id)->get();
                foreach ($products as $product) {
                    $product->update(['category_id' => $item->id]);
                }
                // make nested categories
                if ($item['st_nested_id']) {
                    /** @var Model $item */
                    $category_id = $shopItems->where('st_id', $item['st_nested_id'])->first()->id;
                    $item->update(['category_id' => $category_id]);
                }
            });
        }
    }
}
