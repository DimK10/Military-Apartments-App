<?php

namespace App\Entity;

use App\Repository\MilitaryRankingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MilitaryRankingRepository::class)
 */
class MilitaryRanking
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $rankInGreek;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRankInGreek(): ?string
    {
        return $this->rankInGreek;
    }

    public function setRankInGreek(string $rankInGreek): self
    {
        $this->rankInGreek = $rankInGreek;

        return $this;
    }
}
