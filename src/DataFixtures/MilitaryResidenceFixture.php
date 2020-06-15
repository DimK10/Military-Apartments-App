<?php

namespace App\DataFixtures;

use App\Entity\MilitaryResidence;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MilitaryResidenceFixture extends BaseFixture implements DependentFixtureInterface
{
    public function loadData(ObjectManager $manager)
    {

        $this->createMany(33, 'military_residence', function ($i) {
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

            $militaryResidenceType = array(
                'ΣΟΑ',
                'ΣΟΜΥ',
                'ΣΟΕΠΟΠ'
            );

            $floors = $this->faker->numberBetween(0, 4);
            $apartments = $floors * 7;

            $militaryResidence = new MilitaryResidence();

            if ($i < 11) {
                $militaryResidence->setLocation((string)$locations[$i]);
                $militaryResidence->setName((string)$militaryResidenceType[0]);
            } else if ($i < 22) {
                $militaryResidence->setLocation((string)$locations[$i - 11]);
                $militaryResidence->setName((string)$militaryResidenceType[1]);
            } else {
                $militaryResidence->setLocation((string)$locations[$i - 22]);
                $militaryResidence->setName((string)$militaryResidenceType[2]);
            }

            $militaryResidence->setAddress($this->faker->address);
            $militaryResidence->setFloors($floors);
            $militaryResidence->setNumberOfApartments($apartments);
            $militaryResidence->addApartment($this->getRandomReference('apartments'));

            return $militaryResidence;
        });


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ApartmentFixture::class
        ];
    }


}
