<?php

namespace Sazanof\NovofonApiV2\Responses;

use Psr\Http\Message\ResponseInterface;
use Sazanof\NovofonApiV2\Exceptions\BaseError;

class BaseResponse
{
    protected ?string $jsonRpc = null;
    protected int $id = 0;
    protected ?array $data = null;

    protected ResponseInterface $response;


    /**
     * @throws BaseError
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;

        $parse = $this->parseResponse();
        $this->jsonRpc = $parse['jsonrpc'];
        if (array_key_exists("error", $parse)) {
            throw new BaseError($parse['error']);
        }
        $this->data = $parse['result']['data'];
    }

    private function parseResponse()
    {
        return json_decode($this->response->getBody()->getContents(), true);
    }
}