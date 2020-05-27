<?php

namespace App\DataFixtures;

use App\Entity\Tenant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TenantFixture extends BaseFixture implements DependentFixtureInterface
{
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(21, 'tenants', function ($i) {
            $tenant = new Tenant();


            $tenant->setScore($this->faker->randomNumber(3));
            $tenant->setUser($this->getRandomReference('users'));
            $tenant->addMember($this->getRandomReference('members'));
            $tenant->addVehicle($this->getRandomReference('vehicles'));
            $tenant->addTelephone($this->getRandomReference('telephones'));
            $tenant->setApartment(null);

            return $tenant;
        });

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixture::class,
            MemberFixtures::class,
            VehicleFixture::class,
            TelephoneFixture::class
        ];
    }
}