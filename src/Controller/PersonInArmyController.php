<?php

namespace App\Controller;

use App\Annotation\GrantAccessTo;
use App\Repository\PersonInArmyRepository;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class PersonInArmyController extends BaseController
{
    /**
     * @Route("api/peopleInArmy/no-score", name="people_in_army_no_score", methods={"GET"})
     */
    public function fetchPeopleInArmyWithNoScore(PersonInArmyRepository $personInArmyRepository, SerializerInterface $serializer, Request $request, JWTEncoderInterface $JWTEncoder)
    {
//      TODO - add custom error response

        //        $scores = $scoringRepository->findAll();
        // Check if user is authorized to make this request
        $authorizedRoles = ['ROLE_USER'];
        if (!$this->isUserAuthorized($request, $JWTEncoder, $authorizedRoles)) {
            return $this->json(['status' => 403, 'msg' => 'Δεν είστε εξουσιοδοτημένος για να πραγματοποιήσετε αυ΄τη την ενέργεια.']);
        }

        $location = $request->query->get('location');

        $peopleInArmy = $personInArmyRepository->findAllNoScoreSameLocation($location);
//        dd($peopleInArmy);

        return new Response($serializer->serialize($peopleInArmy, 'json', ['groups' => ['personInArmy:read']]));
    }
}
