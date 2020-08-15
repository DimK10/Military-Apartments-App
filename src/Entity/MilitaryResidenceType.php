<?php

namespace App\Entity;

use App\Repository\MilitaryResidenceTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MilitaryResidenceTypeRepository::class)
 */
class MilitaryResidenceType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity=MilitaryResidence::class, mappedBy="type")
     */
    private $militaryResidences;

    public function __construct()
    {
        $this->militaryResidences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|MilitaryResidence[]
     */
    public function getMilitaryResidences(): Collection
    {
        return $this->militaryResidences;
    }

    public function addMilitaryResidence(MilitaryResidence $militaryResidence): self
    {
        if (!$this->militaryResidences->contains($militaryResidence)) {
            $this->militaryResidences[] = $militaryResidence;
            $militaryResidence->setType($this);
        }

        return $this;
    }

    public function removeMilitaryResidence(MilitaryResidence $militaryResidence): self
    {
        if ($this->militaryResidences->contains($militaryResidence)) {
            $this->militaryResidences->removeElement($militaryResidence);
            // set the owning side to null (unless already changed)
            if ($militaryResidence->getType() === $this) {
                $militaryResidence->setType(null);
            }
        }

        return $this;
    }
}
