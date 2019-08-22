<?php

declare(strict_types=1);

namespace Repositor;

use Webmozart\Assert\Assert;

class Command
{
    /**
     * @var string
     */
    private $service;

    /**
     * @var string
     */
    private $repository;

    /**
     * @var string
     */
    private $branch;

    /**
     * Command constructor.
     */
    public function __construct(
        string $service,
        string $repository,
        string $branch
    ) {
        Assert::string($service);
        Assert::string($repository);
        Assert::string($branch);
        $this->service = $service;
        $this->repository = $repository;
        $this->branch = $branch;
    }

    /**
     * @return string
     */
    public function getService(): string
    {
        return $this->service;
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
}
