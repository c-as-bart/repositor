<?php

declare(strict_types=1);

namespace App\Infrastructure\HttpService;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class HttpService implements HttpServiceInterface
{
    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    /**
     * @param HttpClientInterface $httpClient
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param string $uri
     *
     * @return string
     */
    public function get(string $uri): ResponseInterface
    {
        return $this->httpClient->request('GET', $uri);
    }
}
