<?php

namespace Sazanof\NovofonApiV2\Responses;

use Psr\Http\Message\ResponseInterface;
use Sazanof\NovofonApiV2\Collections\ContactsCollection;

class CreateContactsResponse extends BaseResponse
{
    public int $id;

    public function __construct(ResponseInterface $response)
    {
        parent::__construct($response);
        $result = $this->parseResponse();
        $this->id = (int)$result['id'];
    }
}
