<?php

require_once 'vendor/autoload.php';

use Repositor\BranchResourceFactory;
use Repositor\Command;
use Repositor\GitHubService;
use Repositor\HttpClient;
use Repositor\Repositor;
use Repositor\RepositoryServiceFactory;

$params = getopt(null, [
    "repository:",
    "branch:",
]);



$service = new Repositor(
    new RepositoryServiceFactory(),
    new HttpClient(),
    new BranchResourceFactory()
);
$result = $service->getLastCommitHash(
    new Command(
        GitHubService::NAME,
        $params['repository'],
        $params['branch']
    )
);

echo($result);
exit(1);
