<?php

namespace Sazanof\NovofonApiV2\Responses;

use Psr\Http\Message\ResponseInterface;
use Sazanof\NovofonApiV2\Collections\SipLineVirtualNumberCollection;

class SipLineVirtualNumbersResponse extends BaseResponse
{
    public SipLineVirtualNumberCollection $numbers;

    public function __construct(ResponseInterface $response)
    {
        $this->numbers = new SipLineVirtualNumberCollection();
        parent::__construct($response);
        foreach ($this->data as $sipLine) {
            $this->numbers->add($sipLine);
        }
    }
}