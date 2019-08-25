<?php

declare(strict_types=1);

namespace App\Infrastructure\VscService;

interface VscServiceInterface
{
    /**
     * @param string $repository
     * @param string $branch
     *
     * @return string
     */
    public function getLastCommitHash(
        string $repository,
        string $branch
    ): string;
}
