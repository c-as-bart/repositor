<?php

declare(strict_types=1);

namespace App\Infrastructure\VscService;

use App\Domain\BranchResource\BranchResourceInterface;

interface VscServiceInterface
{
    /**
     * @param string $repository
     * @param string $branch
     *
     * @return BranchResourceInterface
     */
    public function getBranchResource(
        string $repository,
        string $branch
    ): BranchResourceInterface;
}
