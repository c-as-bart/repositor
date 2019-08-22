<?php

declare(strict_types=1);

namespace Repositor;

class GitHubBranchResource implements BranchResourceInterface
{
    /**
     * @var string
     */
    private $content;

    /**
     * GitHubBranchResource constructor.
     *
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->content = json_decode($content);
    }

    public function getLastCommitSha(): string
    {
        return $this->content->commit->sha;
    }
}
