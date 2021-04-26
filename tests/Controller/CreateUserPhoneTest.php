<?php

namespace App\Test\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class CreateUserPhoneTest extends WebTestCase
{
  public function test_create_user(): void
  {
    $client = static::createClient();

    $client->request(method: 'POST', uri: '/users/1/phones',
      content: json_encode([
        'areaCode' => 31,
        'phoneNumber' => '9999-9999'
      ])
    );

    $statusCode = $client->getResponse()->getStatusCode();
    $this->assertSame(Response::HTTP_CREATED, $statusCode);
  }
}