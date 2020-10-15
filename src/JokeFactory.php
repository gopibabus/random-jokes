<?php

declare(strict_types=1);

namespace Gopibabu\Jokes;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class JokeFactory.
 */
class JokeFactory
{
    const API_ENDPOINT = 'http://api.icndb.com/jokes/random';

    protected $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client = null){
        $this->client = $client ?: new Client();
    }

    /**
     * @return mixed
     * @throws GuzzleException
     */
    public function generateJoke()
    {
        $response = $this->client->get(self::API_ENDPOINT);
        $joke =  json_decode($response->getBody()->getContents());

        return $joke->value->joke;
    }
}
