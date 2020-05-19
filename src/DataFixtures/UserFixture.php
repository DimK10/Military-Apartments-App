<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixture extends BaseFixture
{
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(22, 'users', function ($i) {
            $user = new User();

            $user->setEmail(sprintf('user%d@gmail.com', $i));
            $user->setFirstName($this->faker->firstName);
            $user->setLastName($this->faker->lastName);
            $user->setRank('Officer');
            $user->setSpecialty('(EM)');
            $user->setRoles([]);
            $user->setPassword('123456');

            $user->setTenant(null);
            $user->setUnit(null);

            return $user;
        });

        $manager->flush();
    }
}
