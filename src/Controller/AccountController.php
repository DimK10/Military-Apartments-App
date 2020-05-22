<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Security;


class AccountController extends BaseController


{
    /**
     * @Route("/api/signin", name="api_sign_in")
     */
    public function signIn(Request $request, Security $security, UserPasswordEncoderInterface $passwordEncoder)
    {
        $parametersAsArray = $this->encodeRequestBodyToJson($request);

        if(!$parametersAsArray['email'] || !$parametersAsArray['password'])
            return $this->json('bad request', 400);

        $email = $parametersAsArray['email'];
        $password = $parametersAsArray['password'];

        $user = $this->getDoctrine()->getRepository(User::class)->findBy(['email' => $email]);

//        dd($user[0]);

        if (!$user)
            return $this->json('invalid credentials', 400);

        $isValid = $passwordEncoder
            ->isPasswordValid($user[0], $password);

        if (!$isValid)
            return $this->json('invalid credentials', 400);

        // Generate token
        $token = $this->get('lexik_jwt_authentication.encoder')
            ->encode(['username' => $user->getId()]);

        return $this->json($token);
//        $user = $em->getRepository(User::class)->findAll();
//        return $this->json($user, 200, [], ['groups' => ['user:read']]);
    }
}
