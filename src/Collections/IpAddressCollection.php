<?php

namespace Sazanof\NovofonApiV2\Collections;

use Sazanof\NovofonApiV2\Entities\IpAddress;
use Sazanof\NovofonApiV2\Entities\SipLineEntity;

class IpAddressCollection extends Collection
{
    /** @var IpAddress[] $items */
    protected array $items;
    protected ?string $entityClass = IpAddress::class;
}