<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;
use App\Services\ChainAnalysisApi\ChainAnalysisUsers;

class ChainAnalysisProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $client = Http::withToken(env('CHAIN_ANALYSIS_API_KEY'))
            ->withHeaders([
                'Accept' => 'application/json'
            ])
            ->withOptions([
                'base_uri' =>  'MAIN_API_URL'
            ]);

        $this->app->bind(ChainAnalysisUsers::class, function () use ($client) {
            return new ChainAnalysisUsers($client);
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
