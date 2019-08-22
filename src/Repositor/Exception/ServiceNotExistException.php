<?php

declare(strict_types=1);

namespace Repositor\Exception;

use Exception;

class ServiceNotExistException extends Exception
{

    /**
     * ServiceNotExistException constructor.
     */
    public function __construct(string $serviceName)
    {
        parent::__construct();
        $this->message = "For param: {$serviceName} service doesn't exits.";
    }
}
