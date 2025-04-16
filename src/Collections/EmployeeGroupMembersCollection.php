<?php

namespace Sazanof\NovofonApiV2\Collections;

use Sazanof\NovofonApiV2\Entities\EmployeeGroupMember;

/** @method EmployeeGroupMember[] items() */
class EmployeeGroupMembersCollection extends Collection
{
    protected ?string $entityClass = EmployeeGroupMember::class;
}