<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use GuzzleHttp\Client;

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
//        $baseUrl = config('services.guzzlehttp.base_uri');
//
//        $this->app->singleton('GuzzleHttp\Client', function($api) use ($baseUrl ) {
//            //dd($api);
//            return new Client([
//                'base_uri' => $baseUrl,
//                'headers' => [
//                    'Authorization'=>'Basic YWRtaW5Adm9za3Jlc2Vuc3JpeTpwZHNNLTA3',
//                    'Content-Type' => 'application/json;charset=utf-8'
//                ],
//            ]);
//        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
