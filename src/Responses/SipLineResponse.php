<?php

namespace Sazanof\NovofonApiV2\Responses;

use Psr\Http\Message\ResponseInterface;
use Sazanof\NovofonApiV2\Collections\SipLineCollection;
use Sazanof\NovofonApiV2\Exceptions\ReflectionException;

class SipLineResponse extends BaseResponse
{
    public SipLineCollection $lines;

    /**
     * @throws \ReflectionException
     * @throws ReflectionException
     */
    public function __construct(ResponseInterface $response)
    {
        $this->lines = new SipLineCollection();
        parent::__construct($response);
        foreach ($this->data as $sipLine) {
            $this->lines->add($sipLine);
        }
    }
}