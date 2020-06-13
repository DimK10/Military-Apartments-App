<?php

namespace App\Entity;

use App\Repository\ScoringRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ScoringRepository::class)
 */
class Scoring
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"scoring:read"})
     * @ORM\Column(type="boolean")
     */
    private $isMarried;

    /**
     * @Groups({"scoring:read"})
     * @ORM\Column(type="smallint")
     */
    private $hasNumOfChildren;

    /**
     * @Groups({"scoring:read"})
     * @ORM\Column(type="boolean")
     */
    private $hasRelativeWithDisability;

    /**
     * @Groups({"scoring:read"})
     * @ORM\Column(type="smallint")
     */
    private $monthsWaiting;

    /**
     * @Groups({"scoring:read"})
     * @ORM\Column(type="smallint")
     */
    private $monthsHoused;

    /**
     * @Groups({"scoring:read"})
     * @ORM\Column(type="smallint")
     */
    private $monthsAbroad;

    /**
     * @Groups({"scoring:read"})
     * @ORM\Column(type="string", length=255)
     */
    private $income;

    /**
     * @Groups({"scoring:read"})
     * @ORM\Column(type="smallint")
     */
    private $score;

    /**
     * @Groups({"scoring:read"})
     * @ORM\OneToOne(targetEntity=PersonInArmy::class, mappedBy="scoring", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $personInArmy;

    /**
     * @Groups({"scoring:read"})
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $exceptionCode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsMarried(): ?bool
    {
        return $this->isMarried;
    }

    public function setIsMarried(bool $isMarried): self
    {
        $this->isMarried = $isMarried;

        return $this;
    }

    public function getHasNumOfChildren(): ?int
    {
        return $this->hasNumOfChildren;
    }

    public function setHasNumOfChildren(int $hasNumOfChildren): self
    {
        $this->hasNumOfChildren = $hasNumOfChildren;

        return $this;
    }

    public function getHasRelativeWithDisability(): ?bool
    {
        return $this->hasRelativeWithDisability;
    }

    public function setHasRelativeWithDisability(bool $hasRelativeWithDisability): self
    {
        $this->hasRelativeWithDisability = $hasRelativeWithDisability;

        return $this;
    }

    public function getMonthsWaiting(): ?int
    {
        return $this->monthsWaiting;
    }

    public function setMonthsWaiting(int $monthsWaiting): self
    {
        $this->monthsWaiting = $monthsWaiting;

        return $this;
    }

    public function getMonthsHoused(): ?int
    {
        return $this->monthsHoused;
    }

    public function setMonthsHoused(int $monthsHoused): self
    {
        $this->monthsHoused = $monthsHoused;

        return $this;
    }

    public function getMonthsAbroad(): ?int
    {
        return $this->monthsAbroad;
    }

    public function setMonthsAbroad(int $monthsAbroad): self
    {
        $this->monthsAbroad = $monthsAbroad;

        return $this;
    }

    public function getIncome(): ?string
    {
        return $this->income;
    }

    public function setIncome(string $income): self
    {
        $this->income = $income;

        return $this;
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
        $personInArmy->setScoring($this);
    }

    public function getExceptionCode(): ?int
    {
        return $this->exceptionCode;
    }

    public function setExceptionCode(?int $exceptionCode): self
    {
        $this->exceptionCode = $exceptionCode;

        return $this;
    }
}
