<?php

namespace App\DataFixtures;

use App\Entity\Apartment;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ApartmentFixture extends BaseFixture
{
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(21, 'apartments', function ($i) {
            $apartment = new Apartment();

            $num = $i + 1;

            if ($i < 7) {
                $apartment->setName('A'.$num);
                $apartment->setFloor(1);

            } elseif ($i < 14) {
                $apartment->setName('B'.$num);
                $apartment->setFloor(2);
            } else {
                $apartment->setName('Γ'.$num);
                $apartment->setFloor(3);
            }

            $numOfMasterBedrooms = 0;
            $type = '';

            if ($this->faker->boolean) {
                $numOfMasterBedrooms = 1;
                $type = 'ΞΥΛΙΝΟ';

                $apartment->setMasterBedrooms($numOfMasterBedrooms);
                $apartment->setMasterBedroomsFloorType($type);
                $apartment->setLivingroomFloorType($type);
                $apartment->setKitchenFloorType($type);
                $apartment->setWcFloorType($type);
                $apartment->setHallFloorType($type);
            } else {
                $numOfMasterBedrooms = 2;
                $type = 'ΜΑΡΜΑΡΙΝΟ';

                $apartment->setMasterBedrooms($numOfMasterBedrooms);
                $apartment->setMasterBedroomsFloorType($type);
                $apartment->setLivingroomFloorType($type);
                $apartment->setKitchenFloorType($type);
                $apartment->setWcFloorType($type);
                $apartment->setHallFloorType($type);
            }

            $apartment->setMainEntranceDoors($this->faker->randomDigit);
            $apartment->setInteriorDoors($this->faker->randomDigit);
            $apartment->setBalconyDoors($this->faker->randomDigit);
            $apartment->setWcWindows($this->faker->randomDigit);
            $apartment->setKitchenWindows($this->faker->randomDigit);
            $apartment->setElectricPanels($this->faker->randomDigit);
            $apartment->setElectricSockets($this->faker->randomDigit);
            $apartment->setBathHeaters($this->faker->randomDigit);
            $apartment->setKitchenAbsorbers($this->faker->randomDigit);
            $apartment->setTelephoneSockets($this->faker->randomDigit);
            $apartment->setTvSockets($this->faker->randomDigit);
            $apartment->setKitchenHeaters($this->faker->randomDigit);
            $apartment->setToilets($this->faker->randomDigit);
            $apartment->setFaucetBatteries($this->faker->randomDigit);
            $apartment->setFaucets($this->faker->randomDigit);
            $apartment->setDoubleSinks($this->faker->randomDigit);
            $apartment->setKitchenCabinets($this->faker->randomDigit);
            $apartment->setKitchenDrawers($this->faker->randomDigit);
            $apartment->setToileRimsWithSeats($this->faker->randomDigit);
            $apartment->setBathtubs($this->faker->randomDigit);
            $apartment->setBathSinks($this->faker->randomDigit);
            $apartment->setShelvesWithMirror($this->faker->randomDigit);
            $apartment->setTowelHolders($this->faker->randomDigit);
            $apartment->setPaperHolders($this->faker->randomDigit);
            $apartment->setSoapHolders($this->faker->randomDigit);
            $apartment->setSpongeHolders($this->faker->randomDigit);
            $apartment->setRadiatorBodies($this->faker->randomDigit);
            $apartment->setRadiatorKeys($this->faker->randomDigit);
            $apartment->setWardrobes($this->faker->randomDigit);
            $apartment->setBalconyLights($this->faker->randomDigit);
            $apartment->setHouseKeys($this->faker->randomDigit);
            $apartment->setTents($this->faker->randomDigit);
            $apartment->setFlags(1);
            $apartment->setNotes(null);
            $apartment->setMilitaryResidence(null);
            $apartment->setTenant(null);

            return $apartment;


        });

        $manager->flush();
    }
}
