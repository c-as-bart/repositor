<?php

declare(strict_types=1);

namespace App\Infrastructure\VscService;

use App\Domain\BranchResource\BranchResourceInterface;
use App\Domain\BranchResource\GitHubBranchResource;
use App\Infrastructure\HttpService\HttpServiceInterface;
use App\Infrastructure\VscService\Exception\ResourceNotExistException;
use Exception;

class GitHubService implements VscServiceInterface
{
    const NAME = 'GitHub';

    /**
     * @var string
     */
    private $apiHost = 'https://api.github.com';

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
     * @param string $repository
     * @param string $branch
     *
     * @return BranchResourceInterface
     */
    public function getBranchResource(
        string $repository,
        string $branch
    ): BranchResourceInterface {
        try {
            $uri = "{$this->apiHost}/repos/{$repository}/branches/{$branch}";
            $result = $this->httpService->get($uri);

            return new GitHubBranchResource($result->toArray());
        } catch (Exception $exception) {
            throw new ResourceNotExistException();
        }
    }
}
