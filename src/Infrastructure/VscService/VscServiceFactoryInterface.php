<?php

declare(strict_types=1);

namespace App\Infrastructure\VscService;

interface VscServiceFactoryInterface
{
    /**
     * @param string $serviceName
     *
     * @return VscServiceInterface
     */
    public function createService(string $serviceName): VscServiceInterface;
}
