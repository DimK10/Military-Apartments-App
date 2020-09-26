<?php


namespace App\Service;


use App\Entity\Apartment;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ValidationService
{

    private $validator;

    /**
     * ValidationService constructor.
     */
    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function validate($entity): array
    {
        if ($entity instanceof Apartment) {
            $errors = $this->validator->validate($entity);

            if (count($errors) > 0) {
                $errorsArr = [];
                foreach ($errors as $error) {
                    $errorsArr[] = array(
                        "property" => $error->getPropertyPath(),
                        "message" => $error->getMessage()
                    );
                }
                return $errorsArr;
            }
        }
    }
}