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
        $shUnits = Unit::all();

        do {
            $stUnits = json_decode($client->get($this->itemsURL)->getBody()->getContents(), true);
            dump($stUnits['meta']['offset'] . ' Units');

            foreach ($stUnits['rows'] as $item) {

                $stUnit = ResourceUnit::make($item)->resolve();

                if ($shUnits->contains('st_id', $stUnit['st_id'])) {
                    $shUnits->where('st_id', $stUnit['st_id'])
                        ->first()
                        ->update($stUnit);
                } else {
                    Unit::insert($stUnit);
                }

            }

            $this->itemsURL = isset($stUnits['meta']['nextHref']) ? $stUnits['meta']['nextHref'] : false;

        } while ($this->itemsURL);
    }
}
