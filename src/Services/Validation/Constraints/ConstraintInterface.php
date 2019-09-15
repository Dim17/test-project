<?php
declare(strict_types=1);


namespace App\Services\Validation\Constraints;


use Symfony\Component\Validator\Constraints\Collection;

interface ConstraintInterface
{
    public function getConstraint(): Collection;
}