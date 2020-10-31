<?php


namespace App\Service;


use App\Entity\Apartment;
use App\Repository\ApartmentRepository;
use App\Repository\MilitaryResidenceRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\ORMException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ApartmentService
{

    private $validator;
    private $entityManager;
    private $apartmentRepository;
    private $militaryResidenceRepository;

    /**
     * ApartmentService constructor.
     */
    public function __construct(ValidatorInterface $validator, EntityManagerInterface $entityManager, ApartmentRepository $apartmentRepository, MilitaryResidenceRepository $militaryResidenceRepository)
    {
        $this->validator = $validator;
        $this->entityManager = $entityManager;
        $this->apartmentRepository = $apartmentRepository;
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

    public function update($id, Object $data) {
        $apartment = $this->apartmentRepository->find($id);

        try {

            $apartment->setName($data->name);
            $apartment->setFloor($data->floor);
            $apartment->setMasterBedrooms($data->masterBedrooms);
            $apartment->setMasterBedroomsFloorType($data->masterBedroomsFloorType);
            $apartment->setLivingroomFloorType($data->livingroomFloorType);
            $apartment->setKitchenFloorType($data->kitchenFloorType);
            $apartment->setWcFloorType($data->wcFloorType);
            $apartment->setHallFloorType($data->hallFloorType);
            $apartment->setMainEntranceDoors($data->mainEntranceDoors);
            $apartment->setInteriorDoors($data->interiorDoors);
            $apartment->setBalconyDoors($data->balconyDoors);
            $apartment->setWcWindows($data->wcWindows);
            $apartment->setKitchenWindows($data->kitchenWindows);
            $apartment->setElectricPanels($data->electricPanels);
            $apartment->setElectricSockets($data->electricSockets);
            $apartment->setBathHeaters($data->bathHeaters);
            $apartment->setKitchenAbsorbers($data->kitchenAbsorbers);
            $apartment->setTelephoneSockets($data->telephoneSockets);
            $apartment->setTvSockets($data->tvSockets);
            $apartment->setKitchenHeaters($data->kitchenHeaters);
            $apartment->setToilets($data->toilets);
            $apartment->setFaucetBatteries($data->faucetBatteries);
            $apartment->setFaucets($data->faucets);
            $apartment->setDoubleSinks($data->doubleSinks);
            $apartment->setKitchenCabinets($data->kitchenCabinets);
            $apartment->setKitchenDrawers($data->kitchenDrawers);
            $apartment->setToileRimsWithSeats($data->toileRimsWithSeats);
            $apartment->setBathtubs($data->bathtubs);
            $apartment->setBathSinks($data->bathSinks);
            $apartment->setShelvesWithMirror($data->shelvesWithMirror);
            $apartment->setTowelHolders($data->towelHolders);
            $apartment->setPaperHolders($data->paperHolders);
            $apartment->setSoapHolders($data->soapHolders);
            $apartment->setSpongeHolders($data->spongeHolders);
            $apartment->setRadiatorBodies($data->radiatorBodies);
            $apartment->setRadiatorKeys($data->radiatorKeys);
            $apartment->setWardrobes($data->wardrobes);
            $apartment->setBalconyLights($data->balconyLights);
            $apartment->setHouseKeys($data->houseKeys);
            $apartment->setTents($data->tents);
            $apartment->setFlags($data->flags);
            $apartment->setNotes($data->notes);

            $this->entityManager->persist($apartment);
            $this->entityManager->flush();
            return 0;
        }catch (\Exception $e) {
            return new JsonResponse(array('errors' => $e->getMessage(), 500));
        }
    }

    public function delete($id)
    {
        try {
            $apartmentToDelete = $this->apartmentRepository->findOneBy($id);
            $this->entityManager->remove($apartmentToDelete);
            $this->entityManager->flush();

            return 0;
        } catch (\Exception $e) {
            return new JsonResponse(array('errors' => $e->getMessage(), 500));
        }
    }
}