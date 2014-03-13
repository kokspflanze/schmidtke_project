<?php

namespace Igel\MainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SiteControllerTest extends WebTestCase
{
    public function testImpressum()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/impressum');
    }

}
