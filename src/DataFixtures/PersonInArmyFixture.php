<?php

namespace App\DataFixtures;

use App\Entity\PersonInArmy;
use App\Entity\Scoring;
use App\Entity\Tenant;
use App\Entity\Unit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use PhpParser\Node\Expr\Array_;

class PersonInArmyFixture extends BaseFixture implements DependentFixtureInterface
{
    public function loadData(ObjectManager $manager)
    {


        $this->createMany(22, 'peopleInArmy', function ($i) {
            $randomFirstName= array([
                0 => 'Δημήτριος',
                1 => 'Γεώργιος',
                2 => 'Κωνσταντίνος',
                3 => 'Πέτρος',
                4 => 'Χρήστος',
                5 => 'Γιάννης'
            ]);

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

            $randomRanks = [
                0 => 'Ατγος',
                1 => 'Υπτγος',
                2 => 'Τξχος',
                3 => 'Σχης',
                4 => 'Ανχης',
                5 => 'Τχης',
                6 => 'Λγος',
                7 => 'Υπλγος',
                8 => 'Ανθλγος',
                9 => 'Ανθστης',
                10 => 'Αλχιας',
                11 => 'Επχίας',
                12 => 'Λχιας',
                13 => 'Δνεας'
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
            $personInArmy->setFirstname((string)$randomFirstName[rand(0, 5)]);
            $personInArmy->setSurname((string)$randomSurname[rand(0, 9)]);
            $personInArmy->setRank((string)$randomRanks[rand(0, 13)]);
            $personInArmy->setSpecialty((string)$randomSpecialty[rand(0, 7)]);

            $personInArmy->setUnit(null);
            $personInArmy->setTenant($this->getRandomReference('tenants'));
            $personInArmy->setScoring(null);
            $personInArmy->setUser(null);
        });

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TenantFixture::class
        ];
    }


}
