<?php

namespace Admin\MainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/user');
    }

    public function testDetail()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/user/{userid}');
    }

    public function testNew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/user/new');
    }

}
