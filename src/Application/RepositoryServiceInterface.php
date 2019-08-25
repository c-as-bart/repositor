<?php

declare(strict_types=1);

namespace App\Application;

use App\Application\Dto\GetLastCommitParams;

interface RepositoryServiceInterface
{
    /**
     * @param GetLastCommitParams $params
     *
     * @return string
     */
    public function getLastCommitHash(GetLastCommitParams $params): string;
}
