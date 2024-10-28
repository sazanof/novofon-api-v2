<?php

namespace Sazanof\NovofonApiV2\Collections;

use Sazanof\NovofonApiV2\Entities\VirtualNumberEntity;

/** @method VirtualNumberEntity[] items() */
class VirtualNumberCollection extends Collection
{
    protected ?string $entityClass = VirtualNumberEntity::class;
}