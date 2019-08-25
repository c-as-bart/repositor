<?php

declare(strict_types=1);

namespace App\Infrastructure\HttpService;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface HttpServiceInterface
{
    /**
     * @param string $uri
     *
     * @return ResponseInterface
     */
    public function get(string $uri): ResponseInterface;
}
