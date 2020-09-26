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

        $errorsArr = $validationService->validate($newApartment);

        if (count($errorsArr) > 0) {
            return new JsonResponse(array("errors" => $errorsArr), 400);
        }

        return new JsonResponse('Το διαμέρισμα έχει δημιουργηθεί με επιτυχία!', 201);
    }
}
