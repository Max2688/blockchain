<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ChainAnalysisApi\ChainAnalysisUsers;
use Illuminate\Support\Facades\Log;
use App\Services\ChainAnalysisApi\ChainAnalysisApi;
use GuzzleHttp\Exception\ClientException;

class GetChainData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chain:get-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Chain Analysis';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    private ChainAnalysisUsers $user;

    public function __construct(ChainAnalysisUsers $user)
    {
        parent::__construct();
        $this->user = $user;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try
        {
            $response = $this->user->getUsers();
            Log::info($response->getBody());
        } 
        catch(ClientException $e){
            Log::debug($e->getMessage());
        }
        catch(\Exception $e)
        {
            Log::debug($e->getMessage());
        }

        return 0;
    }
}
