<?php

namespace App\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class BaseController extends AbstractController
{

    protected function isUserAuthorized(Request $request, JWTEncoderInterface $JWTEncoder, array $authorizedRoles): bool
    {
        // Decode jwt token
        $token = substr($request->headers->get('authorization'), 7);
        $payload = $JWTEncoder->decode($token);

        $userRoles = $payload['roles'];

        foreach ($userRoles as $role) {
            if (in_array($role, $authorizedRoles))
                return true;
        }

        return false;
    }
}
