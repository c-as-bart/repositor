<?php

declare(strict_types=1);

namespace Repositor;

use Repositor\Exception\ServiceNotExistException;

class BranchResourceFactory
{
    public function build(string $serviceName, string $content): BranchResourceInterface
    {
        switch ($serviceName) {
            case GitHubService::NAME:
                return new GitHubBranchResource($content);
                break;
            default:
                throw new ServiceNotExistException($serviceName);
        }
    }
}
