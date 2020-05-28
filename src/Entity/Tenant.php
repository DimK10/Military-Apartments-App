<?php

namespace App\Entity;

use App\Repository\TenantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TenantRepository::class)
 */
class Tenant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Member::class, mappedBy="tenant", orphanRemoval=true)
     */
    private $members;

    /**
     * @ORM\OneToMany(targetEntity=Vehicle::class, mappedBy="tenant")
     * @ORM\JoinColumn(nullable=true)
     */
//    orphanRemoval=true
    private $vehicles;

    /**
     * @ORM\OneToMany(targetEntity=Telephone::class, mappedBy="tenant")
     * @ORM\JoinColumn(nullable=true)
     */
    //    orphanRemoval=true
    private $telephones;

    /**
     * @ORM\OneToOne(targetEntity=Apartment::class, mappedBy="tenant", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $apartment;

    /**
     * @ORM\OneToOne(targetEntity=PersonInArmy::class, mappedBy="tenant", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $personInArmy;

    public function __construct()
    {
        $this->members = new ArrayCollection();
        $this->vehicles = new ArrayCollection();
        $this->telephones = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Member[]
     */
    public function getMembers(): Collection
    {
        return $this->members;
    }

    public function addMembers(Member $member): self
    {
        if (!$this->members->contains($member)) {
            $this->members[] = $member;
            $member->setTenant($this);
        }

        return $this;
    }

    public function removeMembers(Member $member): self
    {
        if ($this->members->contains($member)) {
            $this->members->removeElement($member);
            // set the owning side to null (unless already changed)
            if ($member->getTenant() === $this) {
                $member->setTenant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Vehicle[]
     */
    public function getVehicles(): Collection
    {
        return $this->vehicles;
    }

    public function addVehicle(Vehicle $vehicle): self
    {
        if (!$this->vehicles->contains($vehicle)) {
            $this->vehicles[] = $vehicle;
            $vehicle->setTenant($this);
        }

        return $this;
    }

    public function removeVehicle(Vehicle $vehicle): self
    {
        if ($this->vehicles->contains($vehicle)) {
            $this->vehicles->removeElement($vehicle);
            // set the owning side to null (unless already changed)
            if ($vehicle->getTenant() === $this) {
                $vehicle->setTenant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Telephone[]
     */
    public function getTelephones(): Collection
    {
        return $this->telephones;
    }

    public function addTelephone(Telephone $telephone): self
    {
        if (!$this->telephones->contains($telephone)) {
            $this->telephones[] = $telephone;
            $telephone->setTenant($this);
        }

        return $this;
    }

    public function removeTelephone(Telephone $telephone): self
    {
        if ($this->telephones->contains($telephone)) {
            $this->telephones->removeElement($telephone);
            // set the owning side to null (unless already changed)
            if ($telephone->getTenant() === $this) {
                $telephone->setTenant(null);
            }
        }

        return $this;
    }

    public function getApartment(): ?Apartment
    {
        return $this->apartment;
    }

    public function setApartment(Apartment $apartment): self
    {
        $this->apartment = $apartment;

        // set the owning side of the relation if necessary
        if ($apartment->getTenant() !== $this) {
            $apartment->setTenant($this);
        }

        return $this;
    }

    public function getPersonInArmy(): ?PersonInArmy
    {
        return $this->personInArmy;
    }

    /**
     * @param mixed $personInArmy
     */
    public function setPersonInArmy($personInArmy): void
    {
        $this->personInArmy = $personInArmy;
    }

//
//    public function setPersonInArmy(?PersonInArmy $personInArmy): self
//    {
//        $this->personInArmy = $personInArmy;
//
//        // set (or unset) the owning side of the relation if necessary
//        $newTenant = null === $personInArmy ? null : $this;
//        if ($personInArmy->getTenant() !== $newTenant) {
//            $personInArmy->setTenant($newTenant);
//        }
//
//        return $this;
//    }
}
