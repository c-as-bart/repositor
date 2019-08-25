<?php

declare(strict_types=1);

namespace App\Infrastructure\VscService;

use App\Infrastructure\HttpService\HttpServiceInterface;
use App\Infrastructure\VscService\Exception\ServiceNotSupportException;

class VscServiceFactory implements VscServiceFactoryInterface
{
    /**
     * @var HttpServiceInterface
     */
    private $httpService;

    /**
     * @param HttpServiceInterface $httpService
     */
    public function __construct(HttpServiceInterface $httpService)
    {
        $this->httpService = $httpService;
    }

    /**
     * @param string $serviceName
     *
     * @return VscServiceInterface
     * @throws ServiceNotSupportException
     */
    public function createService(string $serviceName): VscServiceInterface
    {
        switch ($serviceName) {
            case GitHubService::NAME:
                return new GitHubService($this->httpService);
            default:
                throw new ServiceNotSupportException("Application {$serviceName} not support.");
        }
    }
}
