<?php

namespace Sazanof\NovofonApiV2\Responses;

use Psr\Http\Message\ResponseInterface;
use Sazanof\NovofonApiV2\Collections\VirtualNumberCollection;
use Sazanof\NovofonApiV2\Entities\VirtualNumber;

class VirtualNumberResponse extends BaseResponse
{
    public VirtualNumberCollection $numbers;

    public function __construct(ResponseInterface $response)
    {
        $this->numbers = new VirtualNumberCollection();
        parent::__construct($response);
        foreach ($this->data as $number) {
            $this->numbers->add($number);
        }
        dd($this->numbers);
    }
}