<?php

require_once 'vendor/autoload.php';

use Repositor\BranchResourceFactory;
use Repositor\ConsoleCommandDto;
use Repositor\GitHubService;
use Repositor\HttpClient;
use Repositor\Repositor;
use Repositor\RepositoryServiceFactory;

$params = getopt(null, [
    "repository:",
    "branch:",
    "service:",
]);

$service = new Repositor(
    new RepositoryServiceFactory(),
    new HttpClient(),
    new BranchResourceFactory()
);

$result = $service->getLastCommitHash(
    new ConsoleCommandDto(
        !empty($params['service']) ? $params['service'] : GitHubService::NAME,
        $params['repository'],
        $params['branch']
    )
);

echo $result . PHP_EOL;
exit(1);
