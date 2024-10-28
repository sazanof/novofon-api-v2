<?php

namespace Sazanof\NovofonApiV2\Responses;

use Psr\Http\Message\ResponseInterface;

class AccountResponse extends BaseResponse
{
    public int $appId;
    public string $name;
    public string $timezone;

    public function __construct(ResponseInterface $response)
    {
        parent::__construct($response);
        $this->appId = $this->data[0]['app_id'];
        $this->name = $this->data[0]['name'];
        $this->timezone = $this->data[0]['timezone'];
    }
}