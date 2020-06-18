<?php


namespace App\EventListener;

use Doctrine\Common\Annotations\Reader;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTDecodeFailureException;
use ReflectionClass;
use ReflectionException;
use RuntimeException;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use App\Annotation\GrantAccessTo;

class GrantAccessToListener
{
    private $annotationReader;

    private $JWTEncoder;


    public function __construct(Reader $annotationReader, JWTEncoderInterface $JWTEncoder)
    {
        $this->annotationReader = $annotationReader;
        $this->JWTEncoder = $JWTEncoder;
    }

    public function onKernelController(ControllerEvent $event): void
    {
//        dd($event->getRequest()->headers->get('Authorization'));
        if (!$event->isMasterRequest()) {
            return;
        }

        $controllers = $event->getController();
        $token = substr($event->getRequest()->headers->get('Authorization'), 7);

        if (!is_array($controllers)) {
            return;
        }

        $this->handleAnnotation($controllers, $token);
    }

    private function handleAnnotation(iterable $controllers, string $token): void
    {
        list($controller, $method) = $controllers;

        try {
            $controller = new ReflectionClass($controller);
        } catch (ReflectionException $e) {
            throw new RuntimeException('Failed to read annotation!');
        }

        $this->handleClassAnnotation($controller);
        $this->handleMethodAnnotation($controller, $method, $token);
    }

    private function handleClassAnnotation(ReflectionClass $controller): void
    {
        $annotation = $this->annotationReader->getClassAnnotation($controller, GrantAccessTo::class);

        if ($annotation instanceof GrantAccessTo) {
            dd($annotation);
//            print_r($annotation);
        }
    }

    private function handleMethodAnnotation(ReflectionClass $controller, string $method, string $token): void
    {
        $method = $controller->getMethod($method);
        $annotation = $this->annotationReader->getMethodAnnotation($method, GrantAccessTo::class);

        if ($annotation instanceof GrantAccessTo) {
//            dd($annotation->roles);
//            Accepted roles to continue
            $acceptedRoles = $annotation->roles;
//            Decode token and get the user id
            try {
                $payload = $this->JWTEncoder->decode($token);

                // Check if any of the user roles provides him access to the route
                $roles = $payload['roles'];
                foreach ($roles as $role) {
                    if (in_array($role, $acceptedRoles)) {
                        return;
                    } else {
                        throw new AccessDeniedException();
                    }
                }
            } catch (JWTDecodeFailureException $e) {
                throw new JWTDecodeFailureException('Invalid Token', 'Cannot decode JWT token inside the GrantAccessToListener. Did you provide one?');
            }


//
////            Handle logic for each user role here
//                foreach ($annotation as $role) {
//
//                }
        }
    }
}