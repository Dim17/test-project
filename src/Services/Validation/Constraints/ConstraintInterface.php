<?php


namespace App\Services\Validation\Constraints;


use Symfony\Component\Validator\Constraints\Collection;

interface ConstraintInterface
{
    public function getConstraint(): Collection;
}