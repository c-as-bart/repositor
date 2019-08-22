<?php

declare(strict_types=1);

namespace Repositor;

use Repositor\Exception\ServiceNotExistException;

class RepositoryServiceFactory
{
    public function build(string $serviceName): RepositoryServiceInterface
    {
        switch ($serviceName) {
            case GitHubService::NAME:
                return new GitHubService();
                break;
            default:
                throw new ServiceNotExistException($serviceName);
        }
    }
}
