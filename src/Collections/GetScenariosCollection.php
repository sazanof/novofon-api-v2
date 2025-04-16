<?php

namespace Sazanof\NovofonApiV2\Collections;

use Sazanof\NovofonApiV2\Entities\ScenarioModel;

/** @method ScenarioModel[] items() */
class GetScenariosCollection extends Collection
{
    protected ?string $entityClass = ScenarioModel::class;
}