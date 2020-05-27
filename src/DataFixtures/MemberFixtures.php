<?php

namespace App\DataFixtures;

use App\Entity\Member;
use Doctrine\Persistence\ObjectManager;

class MemberFixtures extends BaseFixture
{
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(90, 'members', function () {
            $member = new Member();
            $member->setFirstName($this->faker->firstName);
            $member->setLastName($this->faker->lastName);
            // TODO - Actually set a tenant hee and make it not nullable
            $member->setTenant(null);

            return $member;

        });

        $manager->flush();
    }
}
