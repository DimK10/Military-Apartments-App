<?php

namespace App\Security\Voter;

use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use phpDocumentor\Reflection\Types\Self_;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class AuthorizationVoter extends Voter
{

    const ROLE = 'ROLE_APARTMENTS_ADMIN';

    protected function supports($attribute, $subject)
    {
        // if the attribute isn't one we support, return false
        if (!in_array($attribute, [self::ROLE])) {
            return false;
        }

        return true;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();
//        dd($user);
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        // CHeck if user is allowed based on subject
        switch ($subject) {
            case 'people_in_army_no_score':
                // Check users roles -- ROLE_APARTMENTS_ADMIN is allowed
                foreach ($user->getRoles() as $userRoles) {
                    if(in_array($attribute, $userRoles)) {
                        return true;
                    }
                }
                break;
        }



        return false;
    }
}
