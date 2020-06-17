<?php

namespace App\Entity;

use App\Repository\UnitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=UnitRepository::class)
 */
class Unit
{

//    TODO - Connect unit with location somehow? Or even better, make location as an entity?

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"user:read", "scoring:read"})
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=PersonInArmy::class, mappedBy="unit")
     */
    private $peopleInArmy;

    /**
     * @Groups("user:read")
     * @ORM\Column(type="string", length=30)
     */
    private $location;

    public function __construct()
    {
        $this->peopleInArmy = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|PersonInArmy[]
     */
    public function getPeopleInArmy(): Collection
    {
        return $this->peopleInArmy;
    }

    public function addPeopleInArmy(PersonInArmy $peopleInArmy): self
    {
        if (!$this->peopleInArmy->contains($peopleInArmy)) {
            $this->peopleInArmy[] = $peopleInArmy;
            $peopleInArmy->setUnit($this);
        }

        return $this;
    }

    public function removePeopleInArmy(PersonInArmy $peopleInArmy): self
    {
        if ($this->peopleInArmy->contains($peopleInArmy)) {
            $this->peopleInArmy->removeElement($peopleInArmy);
            // set the owning side to null (unless already changed)
            if ($peopleInArmy->getUnit() === $this) {
                $peopleInArmy->setUnit(null);
            }
        }

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }
}
