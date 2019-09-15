<?php


namespace App\Services\Validation\Constraints;


use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotEqualTo;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class ReportRequestConstraint implements ConstraintInterface
{
    private const ORDER = [
        'week',
        'month',
        'day',
    ];

    public function getConstraint(): Collection
    {
        $constraint = new Collection([
            'from'     => [
                new NotBlank(),
                new Date(),
            ],
            'to'       => [
                new NotBlank(),
                new Date(),
            ],
            'metrics'  => [
                new NotBlank(),
                new Type('array'),
            ],
            'group_by' => new Callback(function ($payload, ExecutionContextInterface $context) {
                if (!$payload) {
                    $context->buildViolation('This value should not be blank.')
                        ->atPath('group_by')
                        ->setCode(NotBlank::IS_BLANK_ERROR)
                        ->addViolation();
                } else if (!in_array($payload, self::ORDER)) {
                    $context->buildViolation('Invalid Param. Should be one of [week, month, day]')
                        ->atPath('group_by')
                        ->setCode(NotEqualTo::IS_EQUAL_ERROR)
                        ->addViolation();
                }
                return $context;
            }),
        ]);

        return $constraint;
    }
}