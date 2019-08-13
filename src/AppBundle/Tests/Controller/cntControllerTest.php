<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class cntControllerTest extends WebTestCase
{
    public function testFnct()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/fnct');
    }

}
