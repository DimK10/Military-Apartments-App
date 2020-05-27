<?php

namespace App\DataFixtures;

use App\Entity\ScoringRatesProfile;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ScoringRatesProfileFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
         $scoringRatesProfile = new ScoringRatesProfile();

         $scoringRatesProfile->setLieutenantGeneralRate(60);
         $scoringRatesProfile->setMajorGeneralRate(50);
         $scoringRatesProfile->setBrigadierRate(45);
         $scoringRatesProfile->setColonelRate(40);
         $scoringRatesProfile->setLieutenantColonelRate(35);
         $scoringRatesProfile->setMajorRate(30);
         $scoringRatesProfile->setCaptainRate(25);
         $scoringRatesProfile->setLieutenantRate(20);
         $scoringRatesProfile->setSecondLieutenandRate(15);
         $scoringRatesProfile->setWarrantOfficerRate(10);
         $scoringRatesProfile->setWarrantOfficerClass2Rate(9);
         $scoringRatesProfile->setStaffSergeantRate(8);
         $scoringRatesProfile->setSergeantRate(7);
         $scoringRatesProfile->setCorporalRate(6);
         $scoringRatesProfile->setPrivateSoldierRate(4);

         $scoringRatesProfile->setWifeRate(5);
         $scoringRatesProfile->setFirstChildRate(10);
         $scoringRatesProfile->setSecondChildRate(15);

         $scoringRatesProfile->setChildrenStudyingRate(5);
         $scoringRatesProfile->setRelativesWithDisabilityRate(10);
         $scoringRatesProfile->setWaitingToBeHousedRate(2);

         $scoringRatesProfile->setMonthsHousedRate(3);
         $scoringRatesProfile->setMonthsAbroadRate(2);
         $scoringRatesProfile->setExcessIncomeRate(1);

         $manager->persist($scoringRatesProfile);

        $manager->flush();
    }
}
