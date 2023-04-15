<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ChainAnalysisApi\ChainAnalysisApi;
use App\Services\ChainAnalysisApi\ChainAnalysisUsers;
use GuzzleHttp\Client;

class ChainAnalysisProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ChainAnalysisApi::class,function($app)
        {
            $client = new Client(['base_uri' => 'MAIN_API_URL']);
            $headers = [
                'headers'=> [
                    'Token' => env('CHAIN_ANALYSIS_API_KEY'),
                    'Accept' => 'application/json'
                ],
            ];

            return new ChainAnalysisApi($client,$headers);
        });

        $this->app->bind(ChainAnalysisUsers::class,function($app){
            return new ChainAnalysisUsers(
                $app->make(ChainAnalysisApi::class)
            );
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
