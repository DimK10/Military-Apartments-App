<?php

/*
 * This controller is responsible for crud operations in scoring Entity
 *
 * Author: Dimitris Kaitantzidis
 *
 */

namespace App\Controller;

use App\Repository\ScoringRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ScoringController extends AbstractController
{
    /**
     * @return Response
     * @Route("/api/scores", name="api_get_scoring", methods={"GET"})
     */
    public function getPeopleScores(SerializerInterface $serializer, ScoringRepository $scoringRepository)
    {

        $scores = $scoringRepository->findAll();


        return new Response($serializer->serialize($scores, 'json', ['groups' => 'scoring:read']));
    }
}
