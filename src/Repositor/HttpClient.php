<?php

declare(strict_types=1);

namespace Repositor;

use Curl\Curl;
use Repositor\Exception\HttpClientException;

class HttpClient
{
    /**
     * @param string $uri
     *
     * @return string
     */
    public function get(string $uri): string
    {
        $curl = new Curl();
        $curl->get($uri);

        if ($curl->error) {
            throw new HttpClientException($curl->errorMessage);
        }

        return json_encode($curl->response);
    }
}
