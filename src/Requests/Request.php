<?php

namespace Sazanof\NovofonApiV2\Requests;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use Sazanof\NovofonApiV2\Exceptions\BaseError;
use Sazanof\NovofonApiV2\Exceptions\ReflectionException;

class Request
{
    protected Client|null $client = null;

    protected ResponseInterface $response;

    protected string $token;

    public function __construct(string $url, string $token)
    {
        $this->token = $token;
        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $url,
            // You can set any number of default request options.
            'timeout' => 2.0,
        ]);
    }

    /**
     * @return Client|null
     */
    public function getClient(): ?Client
    {
        return $this->client;
    }

    /**
     * @param string $method
     * @param array $params
     * @return $this
     * @throws GuzzleException
     */
    public function make(string $method, array $params = []): static
    {
        $data = [
            'jsonrpc' => '2.0',
            'id' => time(),
            'method' => $method,
            'params' => [
                'access_token' => $this->token
            ]
        ];
        $data['params'] = array_merge($data['params'], $params);
        $this->response = $this->client->post('', [RequestOptions::JSON => $data]);
        return $this;
    }

    /**
     * @param string $className
     * @return mixed
     * @throws BaseError
     */
    public function to(string $className): mixed
    {
        try {
            $class = new \ReflectionClass($className);
            return $class->newInstanceArgs([$this->response]);
        } catch (\ReflectionException $e) {
            return null;
        }
    }
}