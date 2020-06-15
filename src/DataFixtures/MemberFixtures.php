<?php

namespace App\DataFixtures;

use App\Entity\Member;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MemberFixtures extends BaseFixture implements DependentFixtureInterface
{
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(90, 'members', function () {
            $member = new Member();
            $member->setFirstName($this->faker->firstName);
            $member->setLastName($this->faker->lastName);
            $member->setTenant($this->getRandomReference('tenants'));

            return $member;

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
