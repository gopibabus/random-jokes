<?php

declare(strict_types=1);

namespace Gopibabu\Jokes\Tests;

use Gopibabu\Jokes\JokeFactory;
use PHPUnit\Framework\TestCase;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function returnsRandomJoke()
    {
        $joke = new JokeFactory();
        $this->assertSame('This is a random joke', $joke->generateJoke());
    }
}
