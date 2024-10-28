<?php

namespace Sazanof\NovofonApiV2\Collections;

use Sazanof\NovofonApiV2\Entities\SipLineEntity;

/** @method SipLineEntity[] items() */
class SipLineCollection extends Collection
{
    protected ?string $entityClass = SipLineEntity::class;
}