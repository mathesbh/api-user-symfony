<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class CreateUserAction
{
  public function __construct(private EntityManagerInterface $entityManager, private SerializerInterface $serializer)
  {
  }

  #[Route("/users", methods:["POST"])]
  public function __invoke(Request $request): Response
  {
    $user = $this->serializer->deserialize($request->getContent(), User::class, format: 'json');

    $this->entityManager->persist($user);
    $this->entityManager->flush();

    return new JsonResponse([
      'status' => 'ok'
    ], Response::HTTP_CREATED, [
      'Location' => '/users/' . $user->getId()
    ]);
  }
}