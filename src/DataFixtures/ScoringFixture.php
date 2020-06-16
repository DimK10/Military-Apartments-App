<?php

namespace App\DataFixtures;

use App\Entity\PersonInArmy;
use App\Entity\Scoring;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;

class ScoringFixture extends BaseFixture implements DependentFixtureInterface
{

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function loadData(ObjectManager $manager)
    {
//        for ($i=0; $i < 22; $i++) {
//
////            $personInArmy = $this->em->getRepository(PersonInArmy::class)->find($i);
//
//            $scoring = new Scoring();
//            $scoring->setPersonInArmy(null);
//
//            $scoring->setIsMarried(false);
//            $scoring->setHasNumOfChildren(0);
//            $scoring->setHasRelativeWithDisability(false);
//            $scoring->setMonthsWaiting(0);
//            $scoring->setMonthsHoused(0);
//            $scoring->setMonthsAbroad(0);
//            $scoring->setIncome(0);
//            $scoring->setScore(0);
//            $scoring->setExceptionCode(null);
//
//            $manager->persist($scoring);
//        }

        $this->createMany(22, 'scorings', function ($i) {

            $positiveScore = $this->faker->numberBetween(51, 99);
            $negativeScore = $this->faker->numberBetween(0, 50);
            $generalScore = $positiveScore - $negativeScore;

            $scoring = new Scoring();

            $scoring->setPersonInArmy($this->getReference(sprintf('peopleInArmy_%d', $i)));

            $scoring->setIsMarried($this->faker->boolean());
            $scoring->setHasNumOfChildren($this->faker->numberBetween(1, 5));
            $scoring->setHasRelativeWithDisability($this->faker->boolean());
            $scoring->setMonthsWaiting($this->faker->randomNumber(3));
            $scoring->setMonthsHoused($this->faker->randomNumber(3));
            $scoring->setMonthsAbroad($this->faker->randomNumber(3));
            $scoring->setIncome(12000);
            $scoring->setPositiveScore($positiveScore);
            $scoring->setNegativeScore($negativeScore);
            $scoring->setGeneralScore($generalScore);
            $scoring->setExceptionCode(0);
            $scoring->setWishesToBeHoused($this->faker->boolean());

            return $scoring;
        });

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            PersonInArmyFixture::class
        ];
    }


}
