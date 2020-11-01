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

    public function listAllAppartmentsByMilitaryId($milId) {
        return $this->apartmentRepository->getAllApartmentsByMilitaryResidenceId($milId);
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

    public function update($id, Apartment $updatedApartment) {
        $apartment = $this->apartmentRepository->find($id);

        if ($apartment == null) {
            return null;
        }

        try {

            $apartment->setName($updatedApartment->getName());
            $apartment->setFloor($updatedApartment->getFloor());
            $apartment->setMasterBedrooms($updatedApartment->getMasterBedrooms());
            $apartment->setMasterBedroomsFloorType($updatedApartment->getMasterBedroomsFloorType());
            $apartment->setLivingroomFloorType($updatedApartment->getLivingroomFloorType());
            $apartment->setKitchenFloorType($updatedApartment->getKitchenFloorType());
            $apartment->setWcFloorType($updatedApartment->getWcFloorType());
            $apartment->setHallFloorType($updatedApartment->getHallFloorType());
            $apartment->setMainEntranceDoors($updatedApartment->getMainEntranceDoors());
            $apartment->setInteriorDoors($updatedApartment->getInteriorDoors());
            $apartment->setBalconyDoors($updatedApartment->getBalconyDoors());
            $apartment->setWcWindows($updatedApartment->getWcWindows());
            $apartment->setKitchenWindows($updatedApartment->getKitchenWindows());
            $apartment->setElectricPanels($updatedApartment->getElectricPanels());
            $apartment->setElectricSockets($updatedApartment->getElectricSockets());
            $apartment->setBathHeaters($updatedApartment->getBathHeaters());
            $apartment->setKitchenAbsorbers($updatedApartment->getKitchenAbsorbers());
            $apartment->setTelephoneSockets($updatedApartment->getTelephoneSockets());
            $apartment->setTvSockets($updatedApartment->getTvSockets());
            $apartment->setKitchenHeaters($updatedApartment->getKitchenHeaters());
            $apartment->setToilets($updatedApartment->getToilets());
            $apartment->setFaucetBatteries($updatedApartment->getFaucetBatteries());
            $apartment->setFaucets($updatedApartment->getFaucets());
            $apartment->setDoubleSinks($updatedApartment->getDoubleSinks());
            $apartment->setKitchenCabinets($updatedApartment->getKitchenCabinets());
            $apartment->setKitchenDrawers($updatedApartment->getKitchenDrawers());
            $apartment->setToileRimsWithSeats($updatedApartment->getToileRimsWithSeats());
            $apartment->setBathtubs($updatedApartment->getBathtubs());
            $apartment->setBathSinks($updatedApartment->getBathSinks());
            $apartment->setShelvesWithMirror($updatedApartment->getShelvesWithMirror());
            $apartment->setTowelHolders($updatedApartment->getTowelHolders());
            $apartment->setPaperHolders($updatedApartment->getPaperHolders());
            $apartment->setSoapHolders($updatedApartment->getSoapHolders());
            $apartment->setSpongeHolders($updatedApartment->getSpongeHolders());
            $apartment->setRadiatorBodies($updatedApartment->getRadiatorBodies());
            $apartment->setRadiatorKeys($updatedApartment->getRadiatorKeys());
            $apartment->setWardrobes($updatedApartment->getWardrobes());
            $apartment->setBalconyLights($updatedApartment->getBalconyLights());
            $apartment->setHouseKeys($updatedApartment->getHouseKeys());
            $apartment->setTents($updatedApartment->getTents());
            $apartment->setFlags($updatedApartment->getFlags());
            $apartment->setNotes($updatedApartment->getNotes());


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
            $apartmentToDelete = $this->apartmentRepository->find($id);

            if ($apartmentToDelete == null) {
                return null;
            }

            $this->entityManager->remove($apartmentToDelete);
            $this->entityManager->flush();

            return 0;
        } catch (\Exception $e) {
            return new JsonResponse(array('errors' => $e->getMessage(), 500));
        }
    }
}