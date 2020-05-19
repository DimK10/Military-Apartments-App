<?php

namespace App\DataFixtures;

use App\Entity\Unit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class UnitFixture extends BaseFixture implements DependentFixtureInterface
{
    public function loadData(ObjectManager $manager)
    {
       $this->createMany(25, 'units', function () {
           $unit = new Unit();

           $unit->setName($this->faker->company);
           $unit->addUser($this->getRandomReference('users'));

           return $unit;
       });

        $manager->flush();
    }

    public function getDependencies()
    {
        return [UserFixture::class];
    }
}
