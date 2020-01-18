<?php

namespace App\Jobs;

use App\Category;
use App\Http\Resources\Product as ResourceProduct;
use App\Http\Resources\ProductImage as ResourceProductImage;
use App\Product;
use App\Unit;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class PullProduct
 * @package App\Jobs
 */
class PullProduct implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 600;
    public $retryAfter = 650;
    protected $url;
    protected $model;

    /**
     * Create a new job instance.
     *
     * @param string $itemsURL
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
            dump($storeItems['meta']['offset']);
            foreach ($storeItems['rows'] as $key => $item) {
                /** @var Builder $is_item */
                $is_item = $model->where('st_id', $item['id']);
                //dump($is_item->count() . ' ' . $item['id']);
                if ($is_item->count()) {
                    //$shop_id = $is_item->first()->id;
                    if ((int)$is_item->first()->st_version !== (int)$item['version']) {
                        $storeItem = ResourceProduct::make($item)->resolve();
                        $is_item->first()->update($storeItem);
                        info('updated ' . $storeItem['st_name'] . ' product');
                    }

                } else {

                    $storeItem = ResourceProduct::make($item)->resolve();
                    $model->insertGetId($storeItem);
                    info('added ' . $storeItem['st_name'] . ' product');

                }

            }

            $this->url = isset($storeItems['meta']['nextHref']) ? $storeItems['meta']['nextHref'] : false;

        } while ($this->url);

    }

}
