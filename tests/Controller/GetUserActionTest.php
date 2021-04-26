<?php

namespace App\Test\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class GetUserActionTest extends WebTestCase
{
  public function test_get_user_should_return_200(): void
  {
    $client = static::createClient();

    $client->request(method: 'GET', uri: '/users/1');

    $statusCode = $client->getResponse()->getStatusCode();
    $this->assertSame(Response::HTTP_OK, $statusCode);
  }

  public function test_get_user_should_return_400(): void
  {
    $client = static::createClient();

    $client->request(method: 'GET', uri: '/users/999');

    $statusCode = $client->getResponse()->getStatusCode();
    $this->assertSame(Response::HTTP_NOT_FOUND, $statusCode);
  }

  
}