<?php

namespace App\DataFixtures;

use App\Entity\Member;
use Doctrine\Bundle\FixturesBundle\Fixture;
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

    // If we need  a fixture to run BEFORE another fixture, so that its data can be used
    // we need to add them here, ON TOP of the other fixture, so it runs first
//    public function getDependencies()
//    {
//        return [
//            // TODO - Uncomment TenantFixture in MemberFixture
//            //TenantFixture::class
//        ];
//    }
}
