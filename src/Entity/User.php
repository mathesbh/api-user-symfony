<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class User
{
  /**
   * @ORM\Id()
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue() 
   */
  private int $id;

  /**
   * @ORM\Column(type="string", length=100)
   */
  private string $firstName;

  /**
   * @ORM\Column(type="string", length=100)
   */
  private string $lastName;

  /**
   * @ORM\Column(type="string")
   */
  private string $email;

  /**
   * @ORM\Column(type="datetime")
   */
  private \DateTime $createdAt;

  public function __construct()
  {
    $this->createdAt = new \DateTime();
  }

  public function getId(): int
  {
    return $this->id;
  }

  public function getFirstName(): string
  {
    return $this->firstName;
  }

  public function setFirstName(string $firstName): void
  {
    $this->firstName = $firstName;
  }

  public function getLastName(): string
  {
    return $this->lastName;
  }

  public function setLastName(string $lastName): void
  {
    $this->lastName = $lastName;
  }

  public function getEmail(): string
  {
    return $this->email;
  }

  public function setEmail(string $email): void
  {
    $this->email = $email;
  }

  public function getCreatedAt(): \DateTime
  {
    return $this->createdAt;
  }

}