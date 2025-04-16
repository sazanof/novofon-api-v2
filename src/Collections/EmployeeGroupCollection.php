<?php

namespace Sazanof\NovofonApiV2\Collections;

use Sazanof\NovofonApiV2\Entities\EmployeeGroup;

/** @method EmployeeGroup[] items() */
class EmployeeGroupCollection extends Collection
{
    protected ?string $entityClass = EmployeeGroup::class;
}