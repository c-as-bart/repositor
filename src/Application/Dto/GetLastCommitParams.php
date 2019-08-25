<?php

declare(strict_types=1);

namespace App\Application\Dto;

use App\Infrastructure\VscService\GitHubService;

class GetLastCommitParams
{
    /**
     * @var string
     */
    private $repository;

    /**
     * @var string
     */
    private $branch;

    /**
     * @var string|null
     */
    private $service;

    /**
     * @param string      $repository
     * @param string      $branch
     * @param string|null $service
     */
    public function __construct(
        string $repository,
        string $branch,
        ?string $service
    ) {
        $this->repository = $repository;
        $this->branch = $branch;
        $this->service = $service;
    }

    /**
     * @return string
     */
    public function getRepository(): string
    {
        return $this->repository;
    }

    /**
     * @return string
     */
    public function getBranch(): string
    {
        return $this->branch;
    }

    /**
     * @return string|null
     */
    public function getService(): ?string
    {
        return $this->service;
    }
}
