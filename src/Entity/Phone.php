<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
   */
  private int $areaCode;

  /**
   * @ORM\Column(type="string")
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
