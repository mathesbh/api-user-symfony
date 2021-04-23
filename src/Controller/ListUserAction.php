<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListUserAction
{
  public function __construct(private EntityManagerInterface $entityManager)
  {
    
  }

  #[Route("/users", methods:["GET"])]
  public function __invoke(): Response
  {
    $repository = $this->entityManager->getRepository(User::class);
    $users = $repository->findAll();

    $response = [];

    foreach($users as $user){
      $response[] = [
        'id' => $user->getId(),
        'firstName' => $user->getFirstName(),
        'lastName' => $user->getLastName(),
        'email' => $user->getEmail(),
        'createdAt' => $user->getCreatedAt()->format('Y-m-d H:i:s'),
      ];
    }

    return new JsonResponse($response, Response::HTTP_ACCEPTED);
  }
}