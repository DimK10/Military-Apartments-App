<?php

namespace App\Entity;

use App\Repository\MilitaryResidenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MilitaryResidenceRepository::class)
 */
class MilitaryResidence
// TODO - Add MilitaryResidenceType as a separate entity (type: ΣΟΑ, ΣΟΜΥ, ΣΟΕΠΟΠ ΓΙΑ ΣΥΝΘΕΤΕΣ ΑΝΑΖΗΤΗΣΕΙΣ)
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

//    /**
//     * @ORM\Column(type="string", length=50)
//     */
//    private $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $location;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $address;

    /**
     * @ORM\Column(type="smallint")
     */
    private $floors;

    /**
     * @ORM\Column(type="smallint")
     */
    private $numberOfApartments;

    /**
     * @ORM\OneToMany(targetEntity=Apartment::class, mappedBy="militaryResidence")
     */
    private $apartments;

    /**
     * @ORM\ManyToOne(targetEntity=MilitaryResidenceType::class, inversedBy="militaryResidences")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    public function __construct()
    {
        $this->apartments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

//    public function getName(): ?string
//    {
//        return $this->name;
//    }
//
//    public function setName(string $name): self
//    {
//        $this->name = $name;
//
//        return $this;
//    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getFloors(): ?int
    {
        return $this->floors;
    }

    public function setFloors(int $floors): self
    {
        $this->floors = $floors;

        return $this;
    }

    public function getNumberOfApartments(): ?int
    {
        return $this->numberOfApartments;
    }

    public function setNumberOfApartments(int $numberOfApartments): self
    {
        $this->numberOfApartments = $numberOfApartments;

        return $this;
    }

    /**
     * @return Collection|Apartment[]
     */
    public function getApartments(): Collection
    {
        return $this->apartments;
    }

    public function addApartment(Apartment $apartment): self
    {
        if (!$this->apartments->contains($apartment)) {
            $this->apartments[] = $apartment;
            $apartment->setMilitaryResidence($this);
        }

        return $this;
    }

    public function removeApartment(Apartment $apartment): self
    {
        if ($this->apartments->contains($apartment)) {
            $this->apartments->removeElement($apartment);
            // set the owning side to null (unless already changed)
            if ($apartment->getMilitaryResidence() === $this) {
                $apartment->setMilitaryResidence(null);
            }
        }

        return $this;
    }

    public function getType(): ?MilitaryResidenceType
    {
        return $this->type;
    }

    public function setType(?MilitaryResidenceType $type): self
    {
        $this->type = $type;

        return $this;
    }
}
