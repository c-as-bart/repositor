<?php

require_once 'vendor/autoload.php';

use App\Repositor\BranchResourceFactory;
use App\Repositor\ConsoleCommandDto;
use App\Repositor\GitHubService;
use App\Repositor\HttpClient;
use App\Repositor\Repositor;
use App\Repositor\RepositoryServiceFactory;

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
