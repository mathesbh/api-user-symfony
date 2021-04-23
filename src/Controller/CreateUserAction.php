<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateUserAction
{
  public function __construct(private EntityManagerInterface $entityManager)
  {
  }

  #[Route("/users", methods:["POST"])]
  public function __invoke(Request $request): Response
  {
    $requestContent = json_decode($request->getContent(), true);

    $user = new User();
    $user->setFirstName($requestContent['firstName']);
    $user->setLastName($requestContent['lastName']);
    $user->setEmail($requestContent['email']);

    $this->entityManager->persist($user);
    $this->entityManager->flush();

    return new JsonResponse([
      'status' => 'ok'
    ], Response::HTTP_CREATED, [
      'Location' => '/users/' . $user->getId()
    ]);
  }
}