<?php

declare(strict_types=1);

namespace Repositor;

interface RepositoryServiceInterface
{
    public function getBranchResource(string $repository, string $branch);
}
