<?php

namespace App\DataFixtures;

use App\Entity\Vehicle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VehicleFixture extends BaseFixture
{
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(25, 'vehicles', function ($i) {
            $vehicle = new Vehicle();

            $vehicle->setBrand('brand_car_'.$i);
            $vehicle->setColor($this->faker->colorName);
            $vehicle->setLicencePlate('ABC '.$this->faker->numberBetween(1000, 9999));
            // TODO - Change to Tenant
            $vehicle->setTenant(null);

            return $vehicle;
        });

        $manager->flush();
    }
}
