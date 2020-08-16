<?php

namespace App\Entity;

use App\Repository\MilitaryResidenceTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

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
     * @Groups({"user:read"})
     * @ORM\Column(type="string", length=10)
     */
    private $title;

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

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
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
