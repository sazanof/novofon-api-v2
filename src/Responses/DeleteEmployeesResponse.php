<?php

namespace Sazanof\NovofonApiV2\Responses;

use Psr\Http\Message\ResponseInterface;

class DeleteEmployeesResponse extends BaseResponse
{
    public int $id;

    public function __construct(ResponseInterface $response)
    {
        parent::__construct($response);
    }
}