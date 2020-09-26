<?php

namespace App\Controller;

use App\CustomDataClasses\ApartmentClone;
use App\Entity\Apartment;
use App\Repository\ApartmentRepository;
use App\Service\ValidationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ApartmentsController extends AbstractController
{

    const ROLEALLOWED = 'ROLE_BUILDING_ADMIN';


    /**
     * @Route("/api/apartments-by-military-residence/{id}", name="apartments", methods={"GET"})
     */
    public function getAllApartmentsByMilitaryResidenceId($id, ApartmentRepository $apartmentRepository, SerializerInterface $serializer)
    {


        $apartments = $apartmentRepository->getAllApartmentsByMilitaryResidenceId($id);


        return new JsonResponse($apartments);
//        return new Response($serializer->serialize($apartments, 'json', ['groups' => ['apartment:read']]));

    }

    /**
     * Accepts a new apartment as json, parses the data and sends them to db
     *
     * @param bool|string $dummy Some argument description
     * @param array $options An options collection to be used within the transformation
     *
     * @return 201 on valid data
     *
     * @return 400 on not valid data from client
     */

    /**
     * @Route("/api/new-apartment", name="new_apartment", methods={"POST"})
     */

    public function createNewApartment(Request $request, ValidationService $validationService)
    {
        $subject = 'new_apartment';
        $this->denyAccessUnlessGranted(self::ROLEALLOWED, $subject);

        $data = json_decode($request->getContent());

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
        $newApartment->setBathtubs($data->bathTubs);
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
        $newApartment->setMilitaryResidence($data->militaryResidence);
        $newApartment->setTenant($data->tenant);




        $errorsArr = $validationService->validate($newApartment);

        if (count($errorsArr) > 0) {
            return new JsonResponse(array("errors" => $errorsArr), 400);
        }

        return new JsonResponse('Το διαμέρισμα έχει δημιουργηθεί με επιτυχία!', 201);
    }
}
