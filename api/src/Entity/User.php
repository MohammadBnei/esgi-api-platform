<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="date")
     */
    private $birthday;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isOk;

    /**
     * @ORM\OneToMany(targetEntity=Drunk::class, mappedBy="user_id", orphanRemoval=true)
     */
    private $drank;

    public function __construct()
    {
        $this->drank = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getIsOk(): ?bool
    {
        return $this->isOk;
    }

    public function setIsOk(?bool $isOk): self
    {
        $this->isOk = $isOk;

        return $this;
    }

    /**
     * @return Collection|Drunk[]
     */
    public function getDrank(): Collection
    {
        return $this->drank;
    }

    public function addDrank(Drunk $drank): self
    {
        if (!$this->drank->contains($drank)) {
            $this->drank[] = $drank;
            $drank->setUserId($this);
        }

        return $this;
    }

    public function removeDrank(Drunk $drank): self
    {
        if ($this->drank->contains($drank)) {
            $this->drank->removeElement($drank);
            // set the owning side to null (unless already changed)
            if ($drank->getUserId() === $this) {
                $drank->setUserId(null);
            }
        }

        return $this;
    }

}
