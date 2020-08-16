<?php


namespace App\DataFixtures;


use App\Entity\MilitaryResidenceType;
use Doctrine\Persistence\ObjectManager;

class MilitaryResidenceTypeFixture extends BaseFixture
{
    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(3, 'militaryResidenceTypes', function ($i) {

            $militaryResidenceType = array(
                'ΣΟΑ',
                'ΣΟΜΥ',
                'ΣΟΕΠΟΠ'
            );

           $residenceType = new MilitaryResidenceType();
           $residenceType->setType((string)$militaryResidenceType[$i]);

           return $residenceType;
        });

        $manager->flush();
    }
}