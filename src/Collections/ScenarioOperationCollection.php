<?php

namespace Sazanof\NovofonApiV2\Collections;

use Sazanof\NovofonApiV2\Entities\ScenarioOperation;

/** @method ScenarioOperation[] items() */
class ScenarioOperationCollection extends Collection
{
    protected ?string $entityClass = ScenarioOperation::class;
}