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
     * * @Groups({"personInArmy:read"})
     */
    private $id;

    /**
     * @Groups({"personInArmy:read", "personInArmy:write", "user:read", "scoring:read"})
     * @ORM\Column(type="string", length=20)
     */
    private $firstname;

    /**
     * @Groups({"personInArmy:read", "personInArmy:write", "user:read", "scoring:read"})
     * @ORM\Column(type="string", length=20)
     */
    private $surname;

//    /**
//     * @Groups({"personInArmy:read", "personInArmy:write", "user:read", "scoring:read"})
//     * @ORM\Column(type="string", length=10)
//     */
//    // TODO - Move to a seperate entity
//    private $rank;

    /**
     * @Groups({"personInArmy:read", "personInArmy:write", "user:read", "scoring:read"})
     * @ORM\Column(type="string", length=10)
     */
    private $specialty;

    /**
     * @Groups({"personInArmy:read", "personInArmy:write", "user:read"})
     * @ORM\OneToOne(targetEntity=Tenant::class, inversedBy="personInArmy", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
//    todo - remove nullables
    private $tenant;

    /**
     * @Groups({"personInArmy:read", "personInArmy:write", "user:read","scoring:read"})
     * @ORM\ManyToOne(targetEntity=Unit::class, inversedBy="peopleInArmy")
     * @ORM\JoinColumn(nullable=true)
     */
//    todo - remove nullable
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

    /**
     * @Groups("scoring:read")
     * @ORM\Column(type="date", nullable=true)
     */
    private $lastHousingDate;

    /**
     * @ORM\ManyToOne(targetEntity=MilitaryRanking::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $rank;

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

        if (null !== $tenant)
            $tenant->setPersonInArmy($this);

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
     * @param ArrayCollection $user
     */
    public function setUser(ArrayCollection $user): void
    {
        if ($user->isEmpty()) {
            $this->user = null;
        } else {
            $this->user = $user;

        }
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

    public function getLastHousingDate(): ?\DateTimeInterface
    {
        return $this->lastHousingDate;
    }

    public function setLastHousingDate(?\DateTimeInterface $lastHousingDate): self
    {
        $this->lastHousingDate = $lastHousingDate;

        return $this;
    }

    public function getRank(): ?MilitaryRanking
    {
        return $this->rank;
    }

    public function setRank(?MilitaryRanking $rank): self
    {
        $this->rank = $rank;

        return $this;
    }
}
