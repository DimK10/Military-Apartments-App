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



            $tenant->addMembers(null);
            $tenant->addVehicle(null);
            $tenant->addTelephone($this->getRandomReference('telephones'));
//            $tenant->setApartment($this->getRandomReference('apartments'));
            $tenant->setApartment($this->getReference('apartments_'.$i));
            $tenant->setPersonInArmy(null);

            return $tenant;
        });

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TelephoneFixture::class,
            ApartmentFixture::class,
//            PersonInArmyFixture::class
        ];
    }
}
