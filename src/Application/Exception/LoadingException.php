<?php

namespace App\Application\Exception;

use Exception;

class LoadingException extends Exception
{
    public const NO_ELEMENT = 1;
    public const NO_ELEMENT_WITH_THIS_PARAMS = 2;

    public function __construct(
        string $message = "",
        int $code = 0
    ) {
        parent::__construct(
            $message,
            $code,
            null
        );
    }

}
