<?php

namespace App\Services\ChainAnalysisApi;

use Illuminate\Http\Client\Response;

class ChainAnalysisUsers
{

    private ChainAnalysisApi $api;

    public function __construct(ChainAnalysisApi $api)
    {
        $this->api = $api;
    }

    public function getUsers()
    {
        $response = $this->api->get('users');
        $data = json_decode($response->getBody(),true);
        if(empty($data['data']) )
        {
            throw new \Exception('No data found');
        }
        return $response;
    }

    public function getUserById(string $id)
    {
        $response = $this->api->get('users'.'/'.$id);
        
        return $response;
    }

}