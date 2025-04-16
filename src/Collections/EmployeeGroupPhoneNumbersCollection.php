<?php

namespace Sazanof\NovofonApiV2\Collections;

use Sazanof\NovofonApiV2\Entities\EmployeeGroupPhoneNumber;

/** @method EmployeeGroupPhoneNumber[] items() */
class EmployeeGroupPhoneNumbersCollection extends Collection
{
    protected ?string $entityClass = EmployeeGroupPhoneNumber::class;
}