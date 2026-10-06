<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ProfilerLinkLogTest extends WebTestCase
{
    public function testWithoutProfiler(): void
    {
        $client = static::createClient();
        $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
    }

    public function testWithProfiler(): void
    {
        $client = static::createClient();
        $client->enableProfiler();
        $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
    }
}
