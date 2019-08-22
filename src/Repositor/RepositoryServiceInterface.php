<?php

declare(strict_types=1);

namespace Repositor;

interface RepositoryServiceInterface
{
    public function getUriBranchResource(string $repository, string $branch): string;
}
