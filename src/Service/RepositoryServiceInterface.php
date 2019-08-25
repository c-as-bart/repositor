<?php

declare(strict_types=1);

namespace App\Service;

use App\Service\Dto\GetLastCommitParams;

interface RepositoryServiceInterface
{
    /**
     * @param GetLastCommitParams $params
     *
     * @return string
     */
    public function getLastCommitHash(GetLastCommitParams $params): string;
}
