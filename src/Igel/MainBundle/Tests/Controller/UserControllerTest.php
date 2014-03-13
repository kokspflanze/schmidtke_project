<?php

namespace Igel\MainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testRegister()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/register');
    }

    public function testConfirm()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/confirm');
    }

}
