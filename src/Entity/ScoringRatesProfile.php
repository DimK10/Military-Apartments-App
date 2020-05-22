<?php

namespace App\Entity;

use App\Repository\ScoringRatesProfileRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ScoringRatesProfileRepository::class)
 */
class ScoringRatesProfile
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $lieutenantGeneralRate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $majorGeneralRate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $brigadierRate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $lieutenantColonelRate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $majorRate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $captainRate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $lieutenantRate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $secondLieutenandRate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $warrantOfficerRate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $warrantOfficerClass2Rate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $staffSergeantRate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $sergeantRate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $corporalRate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $privateSoldierRate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $wifeRate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $firstChildRate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $secondChildRate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $childrenStudyingRate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $relativesWithDisabilityRate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $waitingToBeHousedRate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $monthsHousedRate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $monthsAbroadRate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $excessIncomeRate;

    /**
     * @ORM\Column(type="smallint")
     */
    private $colonelRate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLieutenantGeneralRate(): ?int
    {
        return $this->lieutenantGeneralRate;
    }

    public function setLieutenantGeneralRate(int $lieutenantGeneralRate): self
    {
        $this->lieutenantGeneralRate = $lieutenantGeneralRate;

        return $this;
    }

    public function getMajorGeneralRate(): ?int
    {
        return $this->majorGeneralRate;
    }

    public function setMajorGeneralRate(int $majorGeneralRate): self
    {
        $this->majorGeneralRate = $majorGeneralRate;

        return $this;
    }

    public function getBrigadierRate(): ?int
    {
        return $this->brigadierRate;
    }

    public function setBrigadierRate(int $brigadierRate): self
    {
        $this->brigadierRate = $brigadierRate;

        return $this;
    }

    public function getLieutenantColonelRate(): ?int
    {
        return $this->lieutenantColonelRate;
    }

    public function setLieutenantColonelRate(int $lieutenantColonelRate): self
    {
        $this->lieutenantColonelRate = $lieutenantColonelRate;

        return $this;
    }

    public function getMajorRate(): ?int
    {
        return $this->majorRate;
    }

    public function setMajorRate(int $majorRate): self
    {
        $this->majorRate = $majorRate;

        return $this;
    }

    public function getCaptainRate(): ?int
    {
        return $this->captainRate;
    }

    public function setCaptainRate(int $captainRate): self
    {
        $this->captainRate = $captainRate;

        return $this;
    }

    public function getLieutenantRate(): ?int
    {
        return $this->lieutenantRate;
    }

    public function setLieutenantRate(int $lieutenantRate): self
    {
        $this->lieutenantRate = $lieutenantRate;

        return $this;
    }

    public function getSecondLieutenandRate(): ?int
    {
        return $this->secondLieutenandRate;
    }

    public function setSecondLieutenandRate(int $secondLieutenandRate): self
    {
        $this->secondLieutenandRate = $secondLieutenandRate;

        return $this;
    }

    public function getWarrantOfficerRate(): ?int
    {
        return $this->warrantOfficerRate;
    }

    public function setWarrantOfficerRate(int $warrantOfficerRate): self
    {
        $this->warrantOfficerRate = $warrantOfficerRate;

        return $this;
    }

    public function getWarrantOfficerClass2Rate(): ?int
    {
        return $this->warrantOfficerClass2Rate;
    }

    public function setWarrantOfficerClass2Rate(int $warrantOfficerClass2Rate): self
    {
        $this->warrantOfficerClass2Rate = $warrantOfficerClass2Rate;

        return $this;
    }

    public function getStaffSergeantRate(): ?int
    {
        return $this->staffSergeantRate;
    }

    public function setStaffSergeantRate(int $staffSergeantRate): self
    {
        $this->staffSergeantRate = $staffSergeantRate;

        return $this;
    }

    public function getSergeantRate(): ?int
    {
        return $this->sergeantRate;
    }

    public function setSergeantRate(int $sergeantRate): self
    {
        $this->sergeantRate = $sergeantRate;

        return $this;
    }

    public function getCorporalRate(): ?int
    {
        return $this->corporalRate;
    }

    public function setCorporalRate(int $corporalRate): self
    {
        $this->corporalRate = $corporalRate;

        return $this;
    }

    public function getPrivateSoldierRate(): ?int
    {
        return $this->privateSoldierRate;
    }

    public function setPrivateSoldierRate(int $privateSoldierRate): self
    {
        $this->privateSoldierRate = $privateSoldierRate;

        return $this;
    }

    public function getWifeRate(): ?int
    {
        return $this->wifeRate;
    }

    public function setWifeRate(int $wifeRate): self
    {
        $this->wifeRate = $wifeRate;

        return $this;
    }

    public function getFirstChildRate(): ?int
    {
        return $this->firstChildRate;
    }

    public function setFirstChildRate(int $firstChildRate): self
    {
        $this->firstChildRate = $firstChildRate;

        return $this;
    }

    public function getSecondChildRate(): ?int
    {
        return $this->secondChildRate;
    }

    public function setSecondChildRate(int $secondChildRate): self
    {
        $this->secondChildRate = $secondChildRate;

        return $this;
    }

    public function getChildrenStudyingRate(): ?int
    {
        return $this->childrenStudyingRate;
    }

    public function setChildrenStudyingRate(int $childrenStudyingRate): self
    {
        $this->childrenStudyingRate = $childrenStudyingRate;

        return $this;
    }

    public function getRelativesWithDisabilityRate(): ?int
    {
        return $this->relativesWithDisabilityRate;
    }

    public function setRelativesWithDisabilityRate(int $relativesWithDisabilityRate): self
    {
        $this->relativesWithDisabilityRate = $relativesWithDisabilityRate;

        return $this;
    }

    public function getWaitingToBeHousedRate(): ?int
    {
        return $this->waitingToBeHousedRate;
    }

    public function setWaitingToBeHousedRate(int $waitingToBeHousedRate): self
    {
        $this->waitingToBeHousedRate = $waitingToBeHousedRate;

        return $this;
    }

    public function getMonthsHousedRate(): ?int
    {
        return $this->monthsHousedRate;
    }

    public function setMonthsHousedRate(int $monthsHousedRate): self
    {
        $this->monthsHousedRate = $monthsHousedRate;

        return $this;
    }

    public function getMonthsAbroadRate(): ?int
    {
        return $this->monthsAbroadRate;
    }

    public function setMonthsAbroadRate(int $monthsAbroadRate): self
    {
        $this->monthsAbroadRate = $monthsAbroadRate;

        return $this;
    }

    public function getExcessIncomeRate(): ?int
    {
        return $this->excessIncomeRate;
    }

    public function setExcessIncomeRate(int $excessIncomeRate): self
    {
        $this->excessIncomeRate = $excessIncomeRate;

        return $this;
    }

    public function getColonelRate(): ?int
    {
        return $this->colonelRate;
    }

    public function setColonelRate(int $colonelRate): self
    {
        $this->colonelRate = $colonelRate;

        return $this;
    }
}
