<?php

namespace App\Jobs;

use App\Http\Resources\Unit as ResourceUnit;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class PullUnit
 * @package App\Jobs
 */
class PullUnit implements ShouldQueue
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

                if ($is_item->count()) {

                    if ((int)$is_item->first()->st_version !== (int)$item['version']) {
                        $storeItem = ResourceUnit::make($item)->resolve();
                        $is_item->first()->update($storeItem);
                        info('updated ' . $storeItem['st_name'] . ' unit');
                    }

                } else {

                    $storeItem = ResourceUnit::make($item)->resolve();
                    $model->insertGetId($storeItem);
                    info('added ' . $storeItem['st_name'] . ' unit');

                }

            }

            $this->url = isset($storeItems['meta']['nextHref']) ? $storeItems['meta']['nextHref'] : false;

        } while ($this->url);
    }
}
