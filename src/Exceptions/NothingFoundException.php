<?php
declare(strict_types=1);


namespace App\Exceptions;


class NothingFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Report with requested params not fount', 404);
    }
}