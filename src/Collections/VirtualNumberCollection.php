<?php

namespace Sazanof\NovofonApiV2\Collections;

use Sazanof\NovofonApiV2\Entities\VirtualNumber;

/** @method VirtualNumber[] items() */
class VirtualNumberCollection extends Collection
{
    protected ?string $entityClass = VirtualNumber::class;
}