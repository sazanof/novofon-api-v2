<?php

namespace Sazanof\NovofonApiV2\Collections;

use Sazanof\NovofonApiV2\Entities\Status;

/** @method Status[] items() */
class StatusesCollection extends Collection
{
    protected ?string $entityClass = Status::class;
}