<?php

namespace App\Entity;

use App\Repository\PersonInArmyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=PersonInArmyRepository::class)
 */
class PersonInArmy
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"personInArmy:read", "personInArmy:write", "user:read"})
     * @ORM\Column(type="string", length=20)
     */
    private $firstname;

    /**
     * @Groups({"personInArmy:read", "personInArmy:write", "user:read"})
     * @ORM\Column(type="string", length=20)
     */
    private $surname;

    /**
     * @Groups({"personInArmy:read", "personInArmy:write", "user:read"})
     * @ORM\Column(type="string", length=10)
     */
    private $rank;

    /**
     * @Groups({"personInArmy:read", "personInArmy:write", "user:read"})
     * @ORM\Column(type="string", length=10)
     */
    private $specialty;

    /**
     * @Groups({"personInArmy:read", "personInArmy:write", "user:read"})
     * @ORM\OneToOne(targetEntity=Tenant::class, inversedBy="personInArmy", cascade={"persist", "remove"})
     */
    private $tenant;

    /**
     * @Groups({"personInArmy:read", "personInArmy:write", "user:read"})
     * @ORM\ManyToOne(targetEntity=Unit::class, inversedBy="peopleInArmy")
     * @ORM\JoinColumn(nullable=true)
     */
    private $unit;

    /**
     * @Groups({"personInArmy:read", "personInArmy:write", "user:read"})
     * @ORM\OneToOne(targetEntity=Scoring::class, inversedBy="personInArmy", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $scoring;

    /**
     * @Groups({"personInArmy:read", "personInArmy:write"})
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="personInArmy")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    public function __construct()
    {
        $this->user = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getRank(): ?string
    {
        return $this->rank;
    }

    public function setRank(string $rank): self
    {
        $this->rank = $rank;

        return $this;
    }

    public function getSpecialty(): ?string
    {
        return $this->specialty;
    }

    public function setSpecialty(string $specialty): self
    {
        $this->specialty = $specialty;

        return $this;
    }

    public function getTenant(): ?Tenant
    {
        return $this->tenant;
    }

    public function setTenant(?Tenant $tenant): self
    {
        $this->tenant = $tenant;

        return $this;
    }

    public function getUnit(): ?Unit
    {
        return $this->unit;
    }

    public function setUnit(?Unit $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    public function getScoring(): ?Scoring
    {
        return $this->scoring;
    }

    public function setScoring(?Scoring $scoring): self
    {
        $this->scoring = $scoring;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
            $user->setPersonInArmy($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->user->contains($user)) {
            $this->user->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getPersonInArmy() === $this) {
                $user->setPersonInArmy(null);
            }
        }

        return $this;
    }
}
