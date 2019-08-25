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
     * @return string
     */
    public function getLastCommitHash(
        string $repository,
        string $branch
    ): string {
        try {
            $uri = "{$this->apiHost}/repos/{$repository}/branches/{$branch}";
            $result = $this->httpService->get($uri)->toArray();

            return $result['commit']['sha'];
        } catch (Exception $exception) {
            throw new ResourceNotExistException();
        }
    }
}
