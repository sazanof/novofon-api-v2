<?php

namespace Sazanof\NovofonApiV2\Responses;

use Psr\Http\Message\ResponseInterface;
use Sazanof\NovofonApiV2\Collections\VirtualNumberCollection;

class SipLineVirtualNumbersResponse extends BaseResponse
{
    public VirtualNumberCollection $numbers;

    public function __construct(ResponseInterface $response)
    {
        $this->numbers = new VirtualNumberCollection();
        parent::__construct($response);
        foreach ($this->data as $sipLine) {
            $this->numbers->add($sipLine);
        }
    }
}