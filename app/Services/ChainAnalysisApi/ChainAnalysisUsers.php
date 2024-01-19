<?php

namespace App\Services\ChainAnalysisApi;

use Illuminate\Http\Client\PendingRequest;

class ChainAnalysisUsers
{
    /**
     * @param PendingRequest $api
     */
    public function __construct(
        private PendingRequest $api
    ){
    }

    /**
     * @return \Illuminate\Http\Client\Response
     * @throws \Exception
     */
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

    /**
     * @param string $id
     * @return \Illuminate\Http\Client\Response
     */
    public function getUserById(string $id)
    {
        $response = $this->api->get('users'.'/'.$id);

        return $response;
    }

}
