<?php

namespace App\DataFixtures;

use App\Entity\Unit;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use phpDocumentor\Reflection\Location;

class UnitFixture extends BaseFixture implements DependentFixtureInterface
{
    public function loadData(ObjectManager $manager)
    {

       $this->createMany(22, 'units', function ($i) {

           $dummyUnits = array(
               '12 ΤΥΠ',
               '12 Μ/Κ ΜΠ',
               'ΓΕΣ/ΔΠΖ',
               'ΔΥΒ/ΔΟΙ',
               'ΚΕΕΜ',
               'ΚΕΥΠ',
               '98 ΤΥΠΕΘ',
               'ΣΣΕ',
               'ΣΜΥ',
           );

           $locations = array(
               'ΑΘΗΝΑ',
               'ΛΑΜΙΑ',
               'ΞΑΝΘΗ',
               'ΑΛΕΞΑΝΔΡΟΥΠΟΛΗ',
               'ΚΟΜΟΤΗΝΗ',
               'ΒΟΛΟΣ',
               'ΛΕΣΒΟΣ',
               'ΚΙΛΚΙΣ',
               'ΣΠΑΡΤΗ',
               'ΤΡΙΚΑΛΑ',
               'ΛΑΡΙΣΣΑ'
           );

           $unit = new Unit();

           $unit->setName($dummyUnits[$this->faker->numberBetween(0, 8)]);
           $unit->addPeopleInArmy($this->getReference(sprintf('peopleInArmy_%d', $i)));
           $unit->setLocation($locations[$this->faker->numberBetween(0, 10)]);
           return $unit;
       });

        $manager->flush();
    }

    public function getDependencies()
    {
        return [PersonInArmyFixture::class];
    }
}
