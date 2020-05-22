<?php

namespace App\Entity;

use App\Repository\RentRatesProfileRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RentRatesProfileRepository::class)
 */
class RentRatesProfile
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $apartmentPositionRate;

    /**
     * @ORM\Column(type="float")
     */
    private $oldnessRate;

    /**
     * @ORM\Column(type="float")
     */
    private $centralHeatingRate;

    /**
     * @ORM\Column(type="float")
     */
    private $ratePerSquareFeet;

    /**
     * @ORM\Column(type="float")
     */
    private $basicRent;

    /**
     * @ORM\Column(type="smallint")
     */
    private $floorRate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getApartmentPositionRate(): ?float
    {
        return $this->apartmentPositionRate;
    }

    public function setApartmentPositionRate(float $apartmentPositionRate): self
    {
        $this->apartmentPositionRate = $apartmentPositionRate;

        return $this;
    }

    public function getOldnessRate(): ?float
    {
        return $this->oldnessRate;
    }

    public function setOldnessRate(float $oldnessRate): self
    {
        $this->oldnessRate = $oldnessRate;

        return $this;
    }

    public function getCentralHeatingRate(): ?float
    {
        return $this->centralHeatingRate;
    }

    public function setCentralHeatingRate(float $centralHeatingRate): self
    {
        $this->centralHeatingRate = $centralHeatingRate;

        return $this;
    }

    public function getRatePerSquareFeet(): ?float
    {
        return $this->ratePerSquareFeet;
    }

    public function setRatePerSquareFeet(float $ratePerSquareFeet): self
    {
        $this->ratePerSquareFeet = $ratePerSquareFeet;

        return $this;
    }

    public function getBasicRent(): ?float
    {
        return $this->basicRent;
    }

    public function setBasicRent(float $basicRent): self
    {
        $this->basicRent = $basicRent;

        return $this;
    }

    public function getFloorRate(): ?int
    {
        return $this->floorRate;
    }

    public function setFloorRate(int $floorRate): self
    {
        $this->floorRate = $floorRate;

        return $this;
    }
}
