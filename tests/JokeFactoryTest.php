<?php
declare(strict_types=1);

namespace Gopibabu\Jokes\Tests;

use Gopibabu\Jokes\JokeFactory;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function returnsRandomJoke()
    {
        $mock = new MockHandler(
            [
                new Response(200, [], '{ "type": "success", "value": { "id": 356, "joke": "We live in an expanding universe. All of it is trying to get away from Chuck Norris.", "categories": [] } }')
            ]
        );

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $joke = new JokeFactory($client);
        $this->assertSame("We live in an expanding universe. All of it is trying to get away from Chuck Norris.", $joke->generateJoke());
    }
}
