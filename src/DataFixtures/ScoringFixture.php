<?php

namespace App\DataFixtures;

use App\Entity\PersonInArmy;
use App\Entity\Scoring;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;

class ScoringFixture extends Fixture implements DependentFixtureInterface
{

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function load(ObjectManager $manager)
    {
        for ($i=0; $i < 22; $i++) {

            $personInArmy = $this->em->getRepository(PersonInArmy::class)->find($i);

            $scoring = new Scoring();
            $scoring->setPersonInArmy($personInArmy);

            $scoring->setIsMarried(false);
            $scoring->setHasNumOfChildren(0);
            $scoring->setHasRelativeWithDisability(false);
            $scoring->setMonthsWaiting(0);
            $scoring->setMonthsHoused(0);
            $scoring->setMonthsAbroad(0);
            $scoring->setIncome(0);
            $scoring->setScore(0);
            $scoring->setExceptionCode(null);

            $manager->persist($scoring);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            PersonInArmyFixture::class
        ];
    }
}
