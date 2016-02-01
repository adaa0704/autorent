<?php

namespace RentAndDriveBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RentControllerTest extends WebTestCase
{
    public function testRentacar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/rent/rentACar');
    }

}
