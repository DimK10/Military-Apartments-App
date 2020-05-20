<?php

namespace App\Entity;

use App\Repository\ApartmentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApartmentRepository::class)
 */
class Apartment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $name;

    /**
     * @ORM\Column(type="smallint")
     */
    private $floor;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $masterBedrooms;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $masterBedroomsFloorType;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $livingroomFloorType;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $kitchenFloorType;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $wcFloorType;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $hallFloorType;

    /**
     * @ORM\Column(type="smallint")
     */
    private $mainEntranceDoors;

    /**
     * @ORM\Column(type="smallint")
     */
    private $interiorDoors;

    /**
     * @ORM\Column(type="smallint")
     */
    private $balconyDoors;

    /**
     * @ORM\Column(type="smallint")
     */
    private $wcWindows;

    /**
     * @ORM\Column(type="smallint")
     */
    private $kitchenWindows;

    /**
     * @ORM\Column(type="smallint")
     */
    private $electricPanels;

    /**
     * @ORM\Column(type="smallint")
     */
    private $electricSockets;

    /**
     * @ORM\Column(type="smallint")
     */
    private $bathHeaters;

    /**
     * @ORM\Column(type="smallint")
     */
    private $kitchenAbsorbers;

    /**
     * @ORM\Column(type="smallint")
     */
    private $telephoneSockets;

    /**
     * @ORM\Column(type="smallint")
     */
    private $tvSockets;

    /**
     * @ORM\Column(type="smallint")
     */
    private $kitchenHeaters;

    /**
     * @ORM\Column(type="smallint")
     */
    private $toilets;

    /**
     * @ORM\Column(type="smallint")
     */
    private $faucetBatteries;

    /**
     * @ORM\Column(type="smallint")
     */
    private $faucets;

    /**
     * @ORM\Column(type="smallint")
     */
    private $doubleSinks;

    /**
     * @ORM\Column(type="smallint")
     */
    private $kitchenCabinets;

    /**
     * @ORM\Column(type="smallint")
     */
    private $kitchenDrawers;

    /**
     * @ORM\Column(type="smallint")
     */
    private $toileRimsWithSeats;

    /**
     * @ORM\Column(type="smallint")
     */
    private $bathtubs;

    /**
     * @ORM\Column(type="smallint")
     */
    private $bathSinks;

    /**
     * @ORM\Column(type="smallint")
     */
    private $shelvesWithMirror;

    /**
     * @ORM\Column(type="smallint")
     */
    private $towelHolders;

    /**
     * @ORM\Column(type="smallint")
     */
    private $paperHolders;

    /**
     * @ORM\Column(type="smallint")
     */
    private $soapHolders;

    /**
     * @ORM\Column(type="smallint")
     */
    private $spongeHolders;

    /**
     * @ORM\Column(type="smallint")
     */
    private $radiatorBodies;

    /**
     * @ORM\Column(type="smallint")
     */
    private $radiatorKeys;

    /**
     * @ORM\Column(type="smallint")
     */
    private $wardrobes;

    /**
     * @ORM\Column(type="smallint")
     */
    private $balconyLights;

    /**
     * @ORM\Column(type="smallint")
     */
    private $houseKeys;

    /**
     * @ORM\Column(type="smallint")
     */
    private $tents;

    /**
     * @ORM\Column(type="smallint")
     */
    private $flags;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $notes;

    /**
     * @ORM\ManyToOne(targetEntity=MilitaryResidence::class, inversedBy="apartments")
     * @ORM\JoinColumn(nullable=true)
     */
    private $militaryResidence;

    /**
     * @ORM\OneToOne(targetEntity=Tenant::class, inversedBy="apartment", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $tenant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFloor(): ?int
    {
        return $this->floor;
    }

    public function setFloor(int $floor): self
    {
        $this->floor = $floor;

        return $this;
    }

    public function getMasterBedrooms(): ?string
    {
        return $this->masterBedrooms;
    }

    public function setMasterBedrooms(string $masterBedrooms): self
    {
        $this->masterBedrooms = $masterBedrooms;

        return $this;
    }

    public function getMasterBedroomsFloorType(): ?string
    {
        return $this->masterBedroomsFloorType;
    }

    public function setMasterBedroomsFloorType(string $masterBedroomsFloorType): self
    {
        $this->masterBedroomsFloorType = $masterBedroomsFloorType;

        return $this;
    }

    public function getLivingroomFloorType(): ?string
    {
        return $this->livingroomFloorType;
    }

    public function setLivingroomFloorType(string $livingroomFloorType): self
    {
        $this->livingroomFloorType = $livingroomFloorType;

        return $this;
    }

    public function getKitchenFloorType(): ?string
    {
        return $this->kitchenFloorType;
    }

    public function setKitchenFloorType(string $kitchenFloorType): self
    {
        $this->kitchenFloorType = $kitchenFloorType;

        return $this;
    }

    public function getWcFloorType(): ?string
    {
        return $this->wcFloorType;
    }

    public function setWcFloorType(string $wcFloorType): self
    {
        $this->wcFloorType = $wcFloorType;

        return $this;
    }

    public function getHallFloorType(): ?string
    {
        return $this->hallFloorType;
    }

    public function setHallFloorType(string $hallFloorType): self
    {
        $this->hallFloorType = $hallFloorType;

        return $this;
    }

    public function getMainEntranceDoors(): ?int
    {
        return $this->mainEntranceDoors;
    }

    public function setMainEntranceDoors(int $mainEntranceDoors): self
    {
        $this->mainEntranceDoors = $mainEntranceDoors;

        return $this;
    }

    public function getInteriorDoors(): ?int
    {
        return $this->interiorDoors;
    }

    public function setInteriorDoors(int $interiorDoors): self
    {
        $this->interiorDoors = $interiorDoors;

        return $this;
    }

    public function getBalconyDoors(): ?int
    {
        return $this->balconyDoors;
    }

    public function setBalconyDoors(int $balconyDoors): self
    {
        $this->balconyDoors = $balconyDoors;

        return $this;
    }

    public function getWcWindows(): ?int
    {
        return $this->wcWindows;
    }

    public function setWcWindows(int $wcWindows): self
    {
        $this->wcWindows = $wcWindows;

        return $this;
    }

    public function getKitchenWindows(): ?int
    {
        return $this->kitchenWindows;
    }

    public function setKitchenWindows(int $kitchenWindows): self
    {
        $this->kitchenWindows = $kitchenWindows;

        return $this;
    }

    public function getElectricPanels(): ?int
    {
        return $this->electricPanels;
    }

    public function setElectricPanels(int $electricPanels): self
    {
        $this->electricPanels = $electricPanels;

        return $this;
    }

    public function getElectricSockets(): ?int
    {
        return $this->electricSockets;
    }

    public function setElectricSockets(int $electricSockets): self
    {
        $this->electricSockets = $electricSockets;

        return $this;
    }

    public function getBathHeaters(): ?int
    {
        return $this->bathHeaters;
    }

    public function setBathHeaters(int $bathHeaters): self
    {
        $this->bathHeaters = $bathHeaters;

        return $this;
    }

    public function getKitchenAbsorbers(): ?int
    {
        return $this->kitchenAbsorbers;
    }

    public function setKitchenAbsorbers(int $kitchenAbsorbers): self
    {
        $this->kitchenAbsorbers = $kitchenAbsorbers;

        return $this;
    }

    public function getTelephoneSockets(): ?int
    {
        return $this->telephoneSockets;
    }

    public function setTelephoneSockets(int $telephoneSockets): self
    {
        $this->telephoneSockets = $telephoneSockets;

        return $this;
    }

    public function getTvSockets(): ?int
    {
        return $this->tvSockets;
    }

    public function setTvSockets(int $tvSockets): self
    {
        $this->tvSockets = $tvSockets;

        return $this;
    }

    public function getKitchenHeaters(): ?int
    {
        return $this->kitchenHeaters;
    }

    public function setKitchenHeaters(int $kitchenHeaters): self
    {
        $this->kitchenHeaters = $kitchenHeaters;

        return $this;
    }

    public function getToilets(): ?int
    {
        return $this->toilets;
    }

    public function setToilets(int $toilets): self
    {
        $this->toilets = $toilets;

        return $this;
    }

    public function getFaucetBatteries(): ?int
    {
        return $this->faucetBatteries;
    }

    public function setFaucetBatteries(int $faucetBatteries): self
    {
        $this->faucetBatteries = $faucetBatteries;

        return $this;
    }

    public function getFaucets(): ?int
    {
        return $this->faucets;
    }

    public function setFaucets(int $faucets): self
    {
        $this->faucets = $faucets;

        return $this;
    }

    public function getDoubleSinks(): ?int
    {
        return $this->doubleSinks;
    }

    public function setDoubleSinks(int $doubleSinks): self
    {
        $this->doubleSinks = $doubleSinks;

        return $this;
    }

    public function getKitchenCabinets(): ?int
    {
        return $this->kitchenCabinets;
    }

    public function setKitchenCabinets(int $kitchenCabinets): self
    {
        $this->kitchenCabinets = $kitchenCabinets;

        return $this;
    }

    public function getKitchenDrawers(): ?int
    {
        return $this->kitchenDrawers;
    }

    public function setKitchenDrawers(int $kitchenDrawers): self
    {
        $this->kitchenDrawers = $kitchenDrawers;

        return $this;
    }

    public function getToileRimsWithSeats(): ?int
    {
        return $this->toileRimsWithSeats;
    }

    public function setToileRimsWithSeats(int $toileRimsWithSeats): self
    {
        $this->toileRimsWithSeats = $toileRimsWithSeats;

        return $this;
    }

    public function getBathtubs(): ?int
    {
        return $this->bathtubs;
    }

    public function setBathtubs(int $bathtubs): self
    {
        $this->bathtubs = $bathtubs;

        return $this;
    }

    public function getBathSinks(): ?int
    {
        return $this->bathSinks;
    }

    public function setBathSinks(int $bathSinks): self
    {
        $this->bathSinks = $bathSinks;

        return $this;
    }

    public function getShelvesWithMirror(): ?int
    {
        return $this->shelvesWithMirror;
    }

    public function setShelvesWithMirror(int $shelvesWithMirror): self
    {
        $this->shelvesWithMirror = $shelvesWithMirror;

        return $this;
    }

    public function getTowelHolders(): ?int
    {
        return $this->towelHolders;
    }

    public function setTowelHolders(int $towelHolders): self
    {
        $this->towelHolders = $towelHolders;

        return $this;
    }

    public function getPaperHolders(): ?int
    {
        return $this->paperHolders;
    }

    public function setPaperHolders(int $paperHolders): self
    {
        $this->paperHolders = $paperHolders;

        return $this;
    }

    public function getSoapHolders(): ?int
    {
        return $this->soapHolders;
    }

    public function setSoapHolders(int $soapHolders): self
    {
        $this->soapHolders = $soapHolders;

        return $this;
    }

    public function getSpongeHolders(): ?int
    {
        return $this->spongeHolders;
    }

    public function setSpongeHolders(int $spongeHolders): self
    {
        $this->spongeHolders = $spongeHolders;

        return $this;
    }

    public function getRadiatorBodies(): ?int
    {
        return $this->radiatorBodies;
    }

    public function setRadiatorBodies(int $radiatorBodies): self
    {
        $this->radiatorBodies = $radiatorBodies;

        return $this;
    }

    public function getRadiatorKeys(): ?int
    {
        return $this->radiatorKeys;
    }

    public function setRadiatorKeys(int $radiatorKeys): self
    {
        $this->radiatorKeys = $radiatorKeys;

        return $this;
    }

    public function getWardrobes(): ?int
    {
        return $this->wardrobes;
    }

    public function setWardrobes(int $wardrobes): self
    {
        $this->wardrobes = $wardrobes;

        return $this;
    }

    public function getBalconyLights(): ?int
    {
        return $this->balconyLights;
    }

    public function setBalconyLights(int $balconyLights): self
    {
        $this->balconyLights = $balconyLights;

        return $this;
    }

    public function getHouseKeys(): ?int
    {
        return $this->houseKeys;
    }

    public function setHouseKeys(int $houseKeys): self
    {
        $this->houseKeys = $houseKeys;

        return $this;
    }

    public function getTents(): ?int
    {
        return $this->tents;
    }

    public function setTents(int $tents): self
    {
        $this->tents = $tents;

        return $this;
    }

    public function getFlags(): ?int
    {
        return $this->flags;
    }

    public function setFlags(int $flags): self
    {
        $this->flags = $flags;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getMilitaryResidence(): ?MilitaryResidence
    {
        return $this->militaryResidence;
    }

    public function setMilitaryResidence(?MilitaryResidence $militaryResidence): self
    {
        $this->militaryResidence = $militaryResidence;

        return $this;
    }

    public function getTenant(): ?Tenant
    {
        return $this->tenant;
    }

    public function setTenant(Tenant $tenant): self
    {
        $this->tenant = $tenant;

        return $this;
    }
}
