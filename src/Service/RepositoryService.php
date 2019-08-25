<?php

declare(strict_types=1);

namespace App\Service;

use App\Infrastructure\VscService\VscServiceFactoryInterface;
use App\Service\Dto\GetLastCommitParams;

class RepositoryService implements RepositoryServiceInterface
{
    /**
     * @var VscServiceFactoryInterface
     */
    private $vscServiceFactory;

    /**
     * @param VscServiceFactoryInterface $vscServiceFactory
     */
    public function __construct(VscServiceFactoryInterface $vscServiceFactory)
    {
        $this->vscServiceFactory = $vscServiceFactory;
    }

    /**
     * @param GetLastCommitParams $params
     *
     * @return string
     */
    public function getLastCommitHash(GetLastCommitParams $params): string
    {
        $service = $this->vscServiceFactory->build($params->getService());
        $resource = $service->getBranchResource(
            $params->getRepository(),
            $params->getBranch()
        );

        return $resource->getLastCommitHash();
    }
}
