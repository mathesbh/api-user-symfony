<?php

namespace App\Test\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class CreateUserActionTest extends WebTestCase
{
  public function test_create_user_post(): void
  {
    $client = static::createClient();

    $client->request(method: 'POST', uri: '/users',
      content: json_encode([
        'firstName' => 'Teste',
        'lastName' => 'Funcional',
        'email' => 'email@teste.funcional',
        'address' => [
          'state' => 'MG',
          'city' => 'BH',
          'district' => 'Centro',
          'street' => 'Av do Contorno',
          'number' => 10,
          'complement' => 'teste'
        ]
      ])
    );

    $statusCode = $client->getResponse()->getStatusCode();
    $this->assertSame(Response::HTTP_CREATED, $statusCode);
  }

  public function test_create_user_with_invalid_data(): void
  {
    $client = static::createClient();

    $client->request(method: 'POST', uri:'/users',
      content: json_encode([
        'firstName' => 'Teste',
        'email' => 'email@teste.funcional',
      ])
    );

    $statusCode = $client->getResponse()->getStatusCode();
    $this->assertSame(Response::HTTP_BAD_REQUEST, $statusCode);
  }
}