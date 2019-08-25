<?php

declare(strict_types=1);

namespace App\Application;

use App\Infrastructure\VscService\VscServiceFactoryInterface;
use App\Application\Dto\GetLastCommitParams;

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
        $service = $this->vscServiceFactory->createService($params->getService());

        return $service->getLastCommitHash(
            $params->getRepository(),
            $params->getBranch()
        );
    }
}
