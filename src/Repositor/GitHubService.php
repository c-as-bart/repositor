<?php

declare(strict_types=1);

namespace Repositor;

class GitHubService implements RepositoryServiceInterface
{
    const NAME = 'GitHub';
    const API_HOST = 'https://api.github.com';

    /**
     * @param string $repository
     * @param string $branch
     *
     * @return string
     */
    public function getUriBranchResource(string $repository, string $branch): string
    {
        return self::API_HOST . "/repos/{$repository}/branches/{$branch}";
    }
}
