<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PersonInArmyController extends AbstractController
{
    /**
     * @Route("/person/in/army", name="person_in_army")
     */
    public function index()
    {
        return $this->render('person_in_army/index.html.twig', [
            'controller_name' => 'PersonInArmyController',
        ]);
    }
}
