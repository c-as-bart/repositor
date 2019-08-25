<?php

declare(strict_types=1);

namespace App\Domain\BranchResource;

class GitHubBranchResource implements BranchResourceInterface
{
    /**
     * @var array
     */
    private $content;

    /**
     * @param array $content
     */
    public function __construct(array $content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getLastCommitHash(): string
    {
        return $this->content['commit']['sha'];
    }
}
