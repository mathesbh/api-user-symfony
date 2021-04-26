<?php

namespace App\Test\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class UpadteUserActionTest extends WebTestCase
{
  public function test_update_user_should_no_content(): void
  {
    $client = static::createClient();

    $client->request(method: 'PUT', uri: '/users/1', content: json_encode([
      'firstName' => 'Teste',
      'lastName' => 'Funcional',
      'email' => 'email@teste.funcional',
    ]));

    $statusCode = $client->getResponse()->getStatusCode();
    $this->assertSame(Response::HTTP_NO_CONTENT, $statusCode);
  }

  public function test_update_user_should_return_400(): void
  {
    $client = static::createClient();

    $client->request(method: 'PUT', uri: '/users/999', content: json_encode([
      'firstName' => 'Teste',
      'lastName' => 'Funcional',
      'email' => 'email@teste.funcional',
    ]));

    $statusCode = $client->getResponse()->getStatusCode();
    $this->assertSame(Response::HTTP_NOT_FOUND, $statusCode);
  }
}
