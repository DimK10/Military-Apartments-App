<?php

namespace App\DataFixtures;

use App\Entity\PersonInArmy;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PersonInArmyFixture extends BaseFixture implements DependentFixtureInterface
{
    public function loadData(ObjectManager $manager)
    {


        $this->createMany(22, 'peopleInArmy', function ($i) {
            $randomFirstName= array(
                'Δημήτριος',
                'Γεώργιος',
                'Κωνσταντίνος',
                'Πέτρος',
                'Χρήστος',
                'Γιάννης'
            );

            $randomSurname = [
                0 => 'Παλαιολόγου',
                1 => 'Ιωάννου',
                2 => 'Παπαπαναγιώτου',
                3 => 'Παπαδόπουλος',
                4 => 'Δημητρίου',
                5 => 'Γεωργίου',
                6 => 'Κουμπούρης',
                7 => 'Αναστασίου',
                8 => 'Αβραμίδης',
                9 => 'Αγγελίδης'
            ];

            $randomSpecialty = [
                0 => '(ΔΒ)',
                1 => '(ΜΧ)',
                2 => '(ΠΒ)',
                3 => '(ΠΖ)',
                4 => '(ΤΘ)',
                5 => '(ΤΧ)',
                6 => '(ΥΓ)',
                7 => '(EM)'
            ];

            $personInArmy = new PersonInArmy();
            $personInArmy->setFirstname($randomFirstName[rand(0, 5)]);
            $personInArmy->setSurname((string)$randomSurname[rand(0, 9)]);
            $personInArmy->setRank($this->getRandomReference('ranks'));
            $personInArmy->setSpecialty((string)$randomSpecialty[rand(0, 7)]);

            $personInArmy->setUnit(null);

            if ($i < 20) {
                $personInArmy->setTenant($this->getReference(sprintf('tenants_%d', $i + 1)));
            } else {
                $personInArmy->setTenant(null);
            }

            $personInArmy->setScoring(null);
            $personInArmy->setUser(new ArrayCollection());

            return $personInArmy;
        });

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            MilitaryRankingFixture::class,
            TenantFixture::class
        ];
    }


}
