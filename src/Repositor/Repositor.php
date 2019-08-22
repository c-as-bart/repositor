<?php

declare(strict_types=1);

namespace Repositor;

use Exception;
use Repositor\Exception\HttpClientException;
use Repositor\Exception\ServiceNotExistException;

final class Repositor
{
    /**
     * @var RepositoryServiceFactory
     */
    private $repositoryServiceFactory;

    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * @var BranchResourceFactory
     */
    private $branchResourceFactory;

    /**
     * Repositor constructor.
     *
     * @param RepositoryServiceFactory $repositoryServiceFactory
     * @param HttpClient               $httpClient
     * @param BranchResourceFactory    $branchResourceFactory
     */
    public function __construct(
        RepositoryServiceFactory $repositoryServiceFactory,
        HttpClient $httpClient,
        BranchResourceFactory $branchResourceFactory
    ) {
        $this->repositoryServiceFactory = $repositoryServiceFactory;
        $this->httpClient = $httpClient;
        $this->branchResourceFactory = $branchResourceFactory;
    }

    public function getLastCommitHash(Command $command): string
    {
        try {
            $repositoryService = $this->repositoryServiceFactory->build($command->getService());
            $uri = $repositoryService->getBranchResource(
                $command->getRepository(),
                $command->getBranch()
            );
            $branchResource = $this->branchResourceFactory->build(
                $command->getService(),
                $this->httpClient->get($uri)
            );

            return $branchResource->getLastCommitSha();
        } catch (ServiceNotExistException | HttpClientException | Exception $exception) {
            return "The process ended in error. {$exception->getMessage()}";
        }
    }
}