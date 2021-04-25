<?php

namespace App\Entity;

use App\Entity\Address;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
   * @Assert\NotBlank(message="Primeiro nome é obrigatório")
   * @Assert\Length(min=3, minMessage="Primeiro nome deve ter pelo menos 3 caracteres", max=100)
   */
  private string $firstName;

  /**
   * @ORM\Column(type="string", length=100)
   * @Assert\NotBlank(message="Sobrenome é obrigatório")
   * @Assert\Length(min=3, minMessage="Sobrenome deve ter pelo menos 3 caracteres", max=100)
   */
  private string $lastName;

  /**
   * @ORM\Column(type="string")
   * @Assert\NotBlank(message="Email é obrigatório")
   * @Assert\Length(min=5, minMessage="Email deve ter pelo menos 5 caracteres")
   */
  private string $email;

  /**
   * @ORM\OneToOne(targetEntity="App\Entity\Address", cascade={"all"})
   * @ORM\JoinColumn(name="address_id", referencedColumnName="id", onDelete="CASCADE")
   */
  private Address $address;

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

  public function getAddress(): Address
  {
    return $this->address;
  }

  public function setAddress(Address $address): void
  {
    $this->address = $address;
  }
}