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
     * @ORM\Column(type="integer")
     */
    private $score;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="tenant", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Member::class, mappedBy="tenant", orphanRemoval=true)
     */
    private $member;

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

    public function __construct()
    {
        $this->member = new ArrayCollection();
        $this->vehicles = new ArrayCollection();
        $this->telephones = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        // set (or unset) the owning side of the relation if necessary
        $newTenant = null === $user ? null : $this;
        if ($user->getTenant() !== $newTenant) {
            $user->setTenant($newTenant);
        }

        return $this;
    }

    /**
     * @return Collection|Member[]
     */
    public function getMember(): Collection
    {
        return $this->member;
    }

    public function addMember(Member $member): self
    {
        if (!$this->member->contains($member)) {
            $this->member[] = $member;
            $member->setTenant($this);
        }

        return $this;
    }

    public function removeMember(Member $member): self
    {
        if ($this->member->contains($member)) {
            $this->member->removeElement($member);
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
}
