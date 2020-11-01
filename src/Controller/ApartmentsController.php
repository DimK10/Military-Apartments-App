<?php

namespace App\Controller;

use App\CustomDataClasses\ApartmentClone;
use App\Entity\Apartment;
use App\Repository\ApartmentRepository;
use App\Service\ApartmentService;
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
    const SUBJECT = 'modify_apartment';


    /**
     * @Route("/api/apartments-by-military-residence/{id}", name="apartments", methods={"GET"})
     */
    public function getAllApartmentsByMilitaryResidenceId($id, ApartmentService $apartmentService)
    {


        $apartments = $apartmentService->listAllAppartmentsByMilitaryId($id);


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

    public function createNewApartment(Request $request, ApartmentService $apartmentService)
    {

        $this->denyAccessUnlessGranted(self::ROLEALLOWED, self::SUBJECT);

        $data = json_decode($request->getContent());

        $newApartment = $apartmentService->createApartmentObject($data);

        $errorsArr = $apartmentService->validate($newApartment);

        if (is_countable($errorsArr) && count($errorsArr) > 0) {
            return new JsonResponse(array("errors" => $errorsArr), 400);
        }

        $apartmentService->create($newApartment);



        return new JsonResponse('Το διαμέρισμα έχει δημιουργηθεί με επιτυχία!', 201);
    }

    /**
     * @Route ("/api/apartment/update/{id}" , name="update_apartment", methods={"POST"})
     */
    public function updateApartment($id, Request $request, ApartmentService $apartmentService)
    {

        $this->denyAccessUnlessGranted(self::ROLEALLOWED, self::SUBJECT);

        $data = json_decode($request->getContent());

        $updatedApartment = $apartmentService->createApartmentObject($data);

        $errorsArr = $apartmentService->validate($updatedApartment);

        if (is_countable($errorsArr) && count($errorsArr) > 0) {
            return new JsonResponse(array("errors" => $errorsArr), 400);
        }

       $result = $apartmentService->update($id, $updatedApartment);

        if ($result == null) {
            return new JsonResponse('Tο διαμέρισμα δεν υπάρχει και άρα δεν ενημερώθηκε!', 404);
        }

        return new JsonResponse('Οι αλλαγές στο διαμέρισμα έχουν πραγματοποιηθεί με επιτυχία!', 200);
    }

    /**
     * @Route ("/api/apartment/delete/{id}" , name="delete_apartment", methods={"POST"})
     */
    public function deleteApartment($id, Request $request, ApartmentService $apartmentService) {

        $this->denyAccessUnlessGranted(self::ROLEALLOWED, self::SUBJECT);

        $result = $apartmentService->delete($id);

        if($result == null) {
            // The appartment did not exist in the first place
            return new JsonResponse('Tο διαμέρισμα δεν υπάρχει και άρα δεν διαγράφηκε!', 404);
        }

        return new JsonResponse('Tο διαμέρισμα διαγράφηκε με επιτυχία!', 200);
    }
}
