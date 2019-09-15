<?php


namespace App\Services\Validation;


use App\Exceptions\ValidationException;
use App\Services\Validation\Constraints\ConstraintInterface;
use Symfony\Component\Validator\Validation;

class Validator
{
    /**
     * @var \Symfony\Component\Validator\Validator\ValidatorInterface
     */
    private $validator;

    public function __construct()
    {
        $this->validator = Validation::createValidator();
    }

    public function validate(array $data, ConstraintInterface $constraint): void
    {
        $violations = $this->validator->validate($data, $constraint->getConstraint());

        if ($violations->count() > 0) {
            throw new ValidationException((string)$violations);
        }
    }


}