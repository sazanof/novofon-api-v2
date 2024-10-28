<?php

namespace Sazanof\NovofonApiV2\Collections;

use Sazanof\NovofonApiV2\Entities\SipLineVirtualNumberEntity;

/** @method SipLineVirtualNumberEntity[] items() */
class SipLineVirtualNumberCollection extends Collection
{
    protected ?string $entityClass = SipLineVirtualNumberEntity::class;
}