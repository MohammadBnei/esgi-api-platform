<?php

namespace App\Entity;

use App\Repository\DrunkRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DrunkRepository::class)
 */
class Drunk
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="drank")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_id;

    /**
     * @ORM\OneToOne(targetEntity=Drink::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $drink_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getDrinkId(): ?Drink
    {
        return $this->drink_id;
    }

    public function setDrinkId(?Drink $drink_id): self
    {
        $this->drink_id = $drink_id;

        return $this;
    }
}
