<?php

namespace App\Services\ChainAnalysisApi;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class ChainAnalysisApi
{

    private $client;

    private array $headers;
    
    public function __construct(Client $client, array $headers)
    {
        
        $this->client = $client;

        $this->headers = $headers;
    }

    public function get(string $path): Response
    {
        return $this->client->get($path,$this->headers);
    }

    public function post(string $path,array $data = []): Response
    {
        return $this->client->get($path,$this->headers);
    }

}