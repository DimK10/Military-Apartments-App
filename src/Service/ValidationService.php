<?php


namespace App\Service;


use App\Entity\Apartment;
use App\Repository\MilitaryResidenceRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\ORMException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ValidationService
{

    private $validator;
    private $entityManager;
    private $militaryResidenceRepository;

    /**
     * ValidationService constructor.
     */
    public function __construct(ValidatorInterface $validator, EntityManagerInterface $entityManager, MilitaryResidenceRepository $militaryResidenceRepository)
    {
        $this->validator = $validator;
        $this->entityManager = $entityManager;
        $this->militaryResidenceRepository = $militaryResidenceRepository;
    }

    public function createApartmentObject($data) : Apartment
    {
        $newApartment = new Apartment();

        $newApartment->setName($data->name);
        $newApartment->setFloor($data->floor);
        $newApartment->setMasterBedrooms($data->masterBedrooms);
        $newApartment->setMasterBedroomsFloorType($data->masterBedroomsFloorType);
        $newApartment->setLivingroomFloorType($data->livingroomFloorType);
        $newApartment->setKitchenFloorType($data->kitchenFloorType);
        $newApartment->setWcFloorType($data->wcFloorType);
        $newApartment->setHallFloorType($data->hallFloorType);
        $newApartment->setMainEntranceDoors($data->mainEntranceDoors);
        $newApartment->setInteriorDoors($data->interiorDoors);
        $newApartment->setBalconyDoors($data->balconyDoors);
        $newApartment->setWcWindows($data->wcWindows);
        $newApartment->setKitchenWindows($data->kitchenWindows);
        $newApartment->setElectricPanels($data->electricPanels);
        $newApartment->setElectricSockets($data->electricSockets);
        $newApartment->setBathHeaters($data->bathHeaters);
        $newApartment->setKitchenAbsorbers($data->kitchenAbsorbers);
        $newApartment->setTelephoneSockets($data->telephoneSockets);
        $newApartment->setTvSockets($data->tvSockets);
        $newApartment->setKitchenHeaters($data->kitchenHeaters);
        $newApartment->setToilets($data->toilets);
        $newApartment->setFaucetBatteries($data->faucetBatteries);
        $newApartment->setFaucets($data->faucets);
        $newApartment->setDoubleSinks($data->doubleSinks);
        $newApartment->setKitchenCabinets($data->kitchenCabinets);
        $newApartment->setKitchenDrawers($data->kitchenDrawers);
        $newApartment->setToileRimsWithSeats($data->toileRimsWithSeats);
        $newApartment->setBathtubs($data->bathtubs);
        $newApartment->setBathSinks($data->bathSinks);
        $newApartment->setShelvesWithMirror($data->shelvesWithMirror);
        $newApartment->setTowelHolders($data->towelHolders);
        $newApartment->setPaperHolders($data->paperHolders);
        $newApartment->setSoapHolders($data->soapHolders);
        $newApartment->setSpongeHolders($data->spongeHolders);
        $newApartment->setRadiatorBodies($data->radiatorBodies);
        $newApartment->setRadiatorKeys($data->radiatorKeys);
        $newApartment->setWardrobes($data->wardrobes);
        $newApartment->setBalconyLights($data->balconyLights);
        $newApartment->setHouseKeys($data->houseKeys);
        $newApartment->setTents($data->tents);
        $newApartment->setFlags($data->flags);
        $newApartment->setNotes($data->notes);

        $militaryResidence = $this->militaryResidenceRepository->findOneBy(array("id" => $data->militaryResidence));

        $newApartment->setMilitaryResidence($militaryResidence);
        $newApartment->setTenant($data->tenant);

        return $newApartment;
    }

    public function validate($entity)
    {
        if ($entity instanceof Apartment) {
            $errors = $this->validator->validate($entity);
            $errorsArr = array();

            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    $errorsArr[] = array(
                        "property" => $error->getPropertyPath(),
                        "message" => $error->getMessage()
                    );
                }
                return $errorsArr;
            }
        }
    }

    public function create(Object $entity)
    {
        try {
            $this->entityManager->persist($entity);
            $this->entityManager->flush();
        } catch (ORMException $e) {
            return new JsonResponse(array('errors' => $e->getMessage(), 500));
        }
    }
}