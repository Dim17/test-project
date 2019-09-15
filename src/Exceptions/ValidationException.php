<?php
declare(strict_types=1);


namespace App\Exceptions;


use Symfony\Component\HttpFoundation\Response;

class ValidationException extends \Exception
{
    public function __construct($message = "")
    {
        parent::__construct($message, Response::HTTP_BAD_REQUEST);
    }
}