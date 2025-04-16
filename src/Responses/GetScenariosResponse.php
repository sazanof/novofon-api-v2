<?php

namespace Sazanof\NovofonApiV2\Responses;

use Psr\Http\Message\ResponseInterface;
use Sazanof\NovofonApiV2\Collections\GetScenariosCollection;

class GetScenariosResponse extends BaseResponse
{
    public GetScenariosCollection $scenarios;

    public function __construct(ResponseInterface $response)
    {
        $this->scenarios = new GetScenariosCollection();
        parent::__construct($response);
        foreach ($this->data as $scenario) {
            $this->scenarios->add($scenario);
        }
    }
}