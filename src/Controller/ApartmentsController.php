<?php

namespace App\Controller;

use App\Repository\ApartmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ApartmentsController extends AbstractController
{
    /**
     * @Route("/api/apartments-by-military-residence/{id}", name="apartments")
     */
    public function getAllApartmentsByMilitaryResidenceId($id, ApartmentRepository $apartmentRepository, SerializerInterface $serializer)
    {


        $apartments = $apartmentRepository->getAllApartmentsByMilitaryResidenceId($id);


        return new Response($serializer->serialize($apartments, 'json', ['groups' => ['apartment:read']]));

    }
}
