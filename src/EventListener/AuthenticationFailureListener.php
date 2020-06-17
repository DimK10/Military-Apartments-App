<?php


namespace App\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationFailureEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Response\JWTAuthenticationFailureResponse;


class AuthenticationFailureListener
{
    /**
     * @param AuthenticationFailureEvent $event
     */
    public function onAuthenticationFailureResponse(AuthenticationFailureEvent $event)
    {

//        dd($event->getResponse()->getStatusCode());

        if ($event->getResponse()->getStatusCode() === 401) {
            $data = [
                'status'  => '401 Unauthorized',
                'msg' => 'Άκυρα διαπιστευτήρια',
            ];

            $response = new JWTAuthenticationFailureResponse($data);

            $event->setResponse($response);
        }

//        $data = [
//            'status'  => '401 Unauthorized',
//            'message' => 'Bad credentials, please verify that your username/password are correctly set',
//        ];
//
//        $response = new JWTAuthenticationFailureResponse($data);
//
//        $event->setResponse($response);
    }
}