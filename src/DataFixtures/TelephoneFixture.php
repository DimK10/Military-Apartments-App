<?php

namespace App\DataFixtures;

use App\Entity\Telephone;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TelephoneFixture extends BaseFixture
{
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(50, 'telephones', function ($i) {
            $telephone = new Telephone();

            $telephone->setNumber('6987654321');

            if ($this->faker->boolean) {
                // set to home number
                $telephone->setType('home');
            } else {
                $telephone->setType('work');
            }
            $telephone->setTenant(null);

            return $telephone;
        });
        $manager->flush();
    }
}
