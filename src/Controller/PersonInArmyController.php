<?php

namespace App\Controller;

use App\Annotation\GrantAccessTo;
use App\Repository\PersonInArmyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class PersonInArmyController extends AbstractController
{
    /**
     * @Route("api/peopleInArmy/no-score", name="people_in_army_no_score", methods={"GET"})
     * @GrantAccessTo(roles={"ROLE_APARTMENTS_ADMIN"})
     */
    public function fetchPeopleInArmyWithNoScore(PersonInArmyRepository $personInArmyRepository, SerializerInterface $serializer, Request $request)
    {
//      TODO - add custom error response

        $location = $request->query->get('location');

        $peopleInArmy = $personInArmyRepository->findAllNoScoreSameLocation($location);

        return new Response($serializer->serialize($peopleInArmy, 'json', ['groups' => 'personInArmy:read']));
    }
}
