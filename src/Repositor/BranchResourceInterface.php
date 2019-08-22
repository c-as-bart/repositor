<?php

declare(strict_types=1);

namespace Repositor;

interface BranchResourceInterface
{
    public function getLastCommitSha(): string;
}
