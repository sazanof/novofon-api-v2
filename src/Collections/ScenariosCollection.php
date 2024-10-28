<?php

namespace Sazanof\NovofonApiV2\Collections;

use Sazanof\NovofonApiV2\Entities\Scenario;

/** @method Scenario[] items() */
class ScenariosCollection extends Collection
{
    protected ?string $entityClass = Scenario::class;
}