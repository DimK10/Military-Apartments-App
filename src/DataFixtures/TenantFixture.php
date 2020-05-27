<?php

namespace App\DataFixtures;

use App\Entity\Tenant;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TenantFixture extends BaseFixture implements DependentFixtureInterface
{
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(21, 'tenants', function ($i) {
            $tenant = new Tenant();



            $tenant->addMembers($this->getRandomReference('members'));
            $tenant->addVehicle($this->getRandomReference('vehicles'));
            $tenant->addTelephone($this->getRandomReference('telephones'));
            $tenant->setApartment($this->getRandomReference('apartments'));
            $tenant->setPersonInArmy(null);

            return $tenant;
        });

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            MemberFixtures::class,
            VehicleFixture::class,
            TelephoneFixture::class,
            ApartmentFixture::class,
            PersonInArmyFixture::class
        ];
    }
}
