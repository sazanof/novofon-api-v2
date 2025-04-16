<?php

namespace Sazanof\NovofonApiV2\Responses;

use Psr\Http\Message\ResponseInterface;
use Sazanof\NovofonApiV2\Collections\StatusesCollection;

class GetStatusesResponse extends BaseResponse
{
    public StatusesCollection $statuses;

    public function __construct(ResponseInterface $response)
    {
        $this->statuses = new StatusesCollection();
        parent::__construct($response);
        foreach ($this->data as $scenario) {
            $this->statuses->add($scenario);
        }
    }
}