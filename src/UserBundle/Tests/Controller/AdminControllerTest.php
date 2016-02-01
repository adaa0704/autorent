<?php

namespace UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminControllerTest extends WebTestCase
{
    public function testAdminpanel()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/adminPanel');
    }

}
