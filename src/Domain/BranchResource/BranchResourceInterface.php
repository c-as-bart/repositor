<?php

declare(strict_types=1);

namespace App\Domain\BranchResource;

interface BranchResourceInterface
{
    /**
     * @return string
     */
    public function getLastCommitHash(): string;
}
