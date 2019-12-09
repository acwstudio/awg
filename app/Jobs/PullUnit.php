<?php

namespace App\Jobs;

use App\Unit;
use App\Http\Resources\Unit as ResourceUnit;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
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

    public $timeout = 120;
    private $itemsURL;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($itemsURL)
    {
        $this->itemsURL = $itemsURL;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Client $client)
    {
        $shopUnits = Unit::all();

        do {
            $storeUnits = json_decode($client->get($this->itemsURL)->getBody()->getContents(), true);
            // update units
            foreach ($storeUnits['rows'] as $st_key => $row) {
                foreach ($shopUnits as $sh_key => $shopUnit) {

                    if ((string)$shopUnit->st_id === (string)$row['id']) {

                        if ((int)$shopUnit->st_version !== (int)$row['version']) {
                            $storeUnit = ResourceUnit::make($row)->resolve();
                            $shopUnit->update($storeUnit);
                            info('updated ' . $storeUnit['st_name'] . ' unit');
                        }

                        $shopUnits->forget($sh_key);
                        unset($storeUnits['rows'][$st_key]);

                    }

                }

            }
            // Add new units
            if (count($storeUnits['rows'])) {
                foreach ($storeUnits['rows'] as $newRow) {

                    $storeUnit = ResourceUnit::make($newRow)->resolve();
                    Unit::insertGetId($storeUnit);
                    info('added ' . $storeUnit['st_name'] . ' unit');
                }
            }

            $this->itemsURL = isset($storeUnits['meta']['nextHref']) ? $storeUnits['meta']['nextHref'] : false;

        } while ($this->itemsURL);
    }
}
