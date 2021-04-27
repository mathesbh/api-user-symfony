<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 */
class Phone
{
  /**
   * @ORM\Id()
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue()
   */
  private int $id;

  /**
   * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="phonenumbers", cascade={"all"})
   * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
   */
  private $user;

  /**
   * @ORM\Column(type="integer")
   *  @Assert\NotBlank(message="Código de área é obrigatório")
   * @Assert\Length(min=2, minMessage="Código de área  deve ter pelo menos 2 caracteres")
   */
  private int $areaCode;

  /**
   * @ORM\Column(type="string")
   * @Assert\NotBlank(message="Número de telefone é obrigatório")
   * @Assert\Length(min=9, minMessage="Número de telefone deve ter pelo menos 9 caracteres")
   */
  private String $phoneNumber;

  public function __construct()
  {
  }

  public function getId(): string
  {
    return $this->id;
  }

  public function getAreaCode(): int
  {
    return $this->areaCode;
  }

  public function setAreaCode(int $areaCode): void
  {
    $this->areaCode = $areaCode;
  }

  public function getPhoneNumber(): string
  {
    return $this->phoneNumber;
  }

  public function setPhoneNumber(string $phoneNumber): void
  {
    $this->phoneNumber = $phoneNumber;
  }

  public function getUser(): User
  {
    return $this->user;
  }

  public function setUser(User $user): void
  {
    $user->addPhonenumber($this);
    $this->user = $user;
  }

}
