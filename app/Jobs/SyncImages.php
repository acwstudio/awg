<?php

namespace App\Jobs;

use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;
use Storage;

/**
 * Class SyncImages
 *
 * @package App\Jobs
 */
class SyncImages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    //protected $redis;

    /**
     * Create a new job instance.
     *
     * @param Client $client
     * @param $data
     */
    public function __construct(Array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @param Client $client
     * @return void
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function handle(Client $client, \Redis $redis)
    {
        //info($this->message);
        dump($this->data['number']);
        $image = $client->get($this->data['url'])->getBody()->getContents();

        Storage::disk('public')->put($this->data['img_name'] . '.jpg', $image);
        $img = Image::load(storage_path('app/public/' . $this->data['img_name'] . '.jpg'));
        $img->fit(Manipulations::FIT_FILL, 400, 400)->background('bebcc1')->save();

        $redis->set('api:images:offset', $this->data['number']);
    }
}
