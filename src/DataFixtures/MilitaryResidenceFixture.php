<?php

namespace App\DataFixtures;

use App\Entity\MilitaryResidence;
use App\Entity\MilitaryResidenceType;
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

//            $militaryResidenceType = array(
//                'ΣΟΑ',
//                'ΣΟΜΥ',
//                'ΣΟΕΠΟΠ'
//            );

            $floors = $this->faker->numberBetween(1, 4);
            $apartments = $floors * 7;

            $militaryResidence = new MilitaryResidence();

            if ($i < 11) {
                $militaryResidence->setLocation((string)$locations[$i]);
                $militaryResidence->setType($this->getReference(sprintf('militaryResidenceTypes_%d', 0)));
            } else if ($i < 22) {
                $militaryResidence->setLocation((string)$locations[$i - 11]);
                $militaryResidence->setType($this->getReference(sprintf('militaryResidenceTypes_%d', 1)));
            } else {
                $militaryResidence->setLocation((string)$locations[$i - 22]);
                $militaryResidence->setType($this->getReference(sprintf('militaryResidenceTypes_%d', 2)));
            }

            $militaryResidence->setAddress($this->faker->address);
            $militaryResidence->setFloors($floors);
            $militaryResidence->setNumberOfApartments($apartments);

            if ($i < 21) {
                $militaryResidence->addApartment($this->getReference(sprintf('apartments_%d', $i)));
            } else {
                $militaryResidence->addApartment($this->getReference(sprintf('apartments_%d', $i - 21)));
            }

            $militaryResidence->addApartment($this->getRandomReference('apartments'));

            return $militaryResidence;
        });


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            MilitaryResidenceTypeFixture::class,
            ApartmentFixture::class
        ];
    }


}
