<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetUserAction
{
  public function __construct(private EntityManagerInterface $entityManager)
  {
    
  }

  #[Route("/users/{id}", methods:["GET"])]
  public function __invoke(int $id): Response
  {
    $repository = $this->entityManager->getRepository(User::class);
    $user = $repository->find($id);

    if(null === $user){
      return new JsonResponse([
        'error' => 'User not found'
      ], Response::HTTP_NOT_FOUND);
    }

    return new JsonResponse([
      'id' => $user->getId(),
      'firstName' => $user->getFirstName(),
      'lastName' => $user->getLastName(),
      'email' => $user->getEmail(),
      'createdAt' => $user->getCreatedAt()->format('Y-m-d H:i:s'),
      ]);
  }
}