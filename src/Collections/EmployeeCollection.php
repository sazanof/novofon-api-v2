<?php

namespace Sazanof\NovofonApiV2\Collections;

use Sazanof\NovofonApiV2\Entities\Employee;

/** @method Employee[] items() */
class EmployeeCollection extends Collection
{
    protected ?string $entityClass = Employee::class;
}