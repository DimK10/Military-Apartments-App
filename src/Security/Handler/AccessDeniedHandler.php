<?php


namespace App\Security\Handler;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authorization\AccessDeniedHandlerInterface;

class AccessDeniedHandler implements AccessDeniedHandlerInterface
{


    public function handle(Request $request, AccessDeniedException $accessDeniedException)
    {
        $message = 'Δεν είστε εξουσιοδοτημένοι για να δείτε αυτό το περιεχόμενο! Σε περίπτωση λάθους, επικοινωνήστε με τον διαχειριστή του συστήματος.';
        return new JsonResponse(['msg' => $message], 403);
    }
}