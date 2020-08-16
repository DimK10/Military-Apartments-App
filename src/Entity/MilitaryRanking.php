<?php

namespace App\Entity;

use App\Repository\MilitaryRankingRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

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
     * @Groups({"personInArmy:read", "personInArmy:write", "user:read", "scoring:read"})
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
