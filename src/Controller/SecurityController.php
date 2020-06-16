<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class SecurityController extends AbstractController
{
    /* session based authentication */

    /**
     * @Route("/api/auth", name="app_auth")
     */
    public function authenticate(SerializerInterface $serializer)
    {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {

            return $this->json([
                'errors' => ['msg' => 'Invalid login request: check that the Content-Type header is "application/json"']
            ], 400);
        }

        return new Response($serializer->serialize($this->getUser(), 'json', ['groups' => ['user:read']]));
        //        return $this->json($this->getUser(), 200);
    }

    /** @Route("/api/logout", name="app_logout") */
    public function logout()
    {
        throw new \Exception('This Controller should not be reached');
    }
}
