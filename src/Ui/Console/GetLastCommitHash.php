<?php

declare(strict_types=1);

namespace App\Ui\Console;

use App\Infrastructure\VscService\Exception\ResourceNotExistException;
use App\Infrastructure\VscService\Exception\ServiceNotSupportException;
use App\Infrastructure\VscService\GitHubService;
use App\Application\Dto\GetLastCommitParams;
use App\Application\RepositoryServiceInterface;
use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetLastCommitHash extends Command
{
    const ARGUMENT_REPOSITORY = 'repository';
    const ARGUMENT_BRANCH = 'branch';
    const ARGUMENT_SERVICE = 'service';

    const INTERNAL_ERROR = 1;
    const SERVICE_NOT_SUPPORT_ERROR = 2;
    const RESOURCE_NOT_EXIST_ERROR = 3;

    protected static $defaultName = 'repositor:get-last-commit-hash';

    /**
     * @var RepositoryServiceInterface
     */
    private $repositoryService;

    /**
     * @param RepositoryServiceInterface $repositoryService
     */
    public function __construct(RepositoryServiceInterface $repositoryService)
    {
        $this->repositoryService = $repositoryService;

        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Return last commit hash from VSC services.');
        $this->addArgument(self::ARGUMENT_REPOSITORY, InputArgument::REQUIRED);
        $this->addArgument(self::ARGUMENT_BRANCH, InputArgument::REQUIRED);
        $this->addArgument(self::ARGUMENT_SERVICE, InputArgument::OPTIONAL);
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $params = new GetLastCommitParams(
                $input->getArgument(self::ARGUMENT_REPOSITORY),
                $input->getArgument(self::ARGUMENT_BRANCH),
                $input->getArgument(self::ARGUMENT_SERVICE) ?: GitHubService::NAME
            );

            $output->writeln(
                $this->repositoryService->getLastCommitHash($params)
            );
        } catch (ServiceNotSupportException $serviceNotSupportException) {
            $output->writeln("Service {$params->getService()} not support.");

            return self::SERVICE_NOT_SUPPORT_ERROR;
        } catch (ResourceNotExistException $resourceNotExistException) {
            $output->writeln(
                "For params: {$params->getRepository()} {$params->getBranch()} resource not exist."
            );

            return self::RESOURCE_NOT_EXIST_ERROR;
        } catch (Exception $exception) {
            $output->writeln($exception->getMessage());

            return self::INTERNAL_ERROR;
        }
    }
}
