<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Redis;

/**
 * Class AppServiceProvider
 *
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $baseUrl = config('api-store.guzzlehttp.base_uri');

        $this->app->singleton('GuzzleHttp\Client', function($api) use ($baseUrl ) {
            return new Client([
                'base_uri' => $baseUrl,
                'headers' => [
                    'Authorization'=> config('api-store.guzzlehttp.token'),
                    'Content-Type' => config('api-store.guzzlehttp.content-type')
                ],
            ]);
        });

//        $this->app->singleton('Redis', function($api) use ($baseUrl ) {
//            $redis = new Redis();
//            $redis->connect('127.0.0.1');
//            $redis->setOption(Redis::OPT_SERIALIZER, 1);
//            return $redis;
//        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {

    }
}
