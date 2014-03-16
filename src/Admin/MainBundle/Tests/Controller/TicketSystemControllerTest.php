<?php

namespace Admin\MainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TicketSystemControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/ticketsystem');
    }

    public function testDetail()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/ticketsystem/{ticketid}');
    }

    public function testClose()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/ticketsystem/close/{ticketid}');
    }

}
