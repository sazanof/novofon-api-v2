<?php

namespace Sazanof\NovofonApiV2\Collections;

use Sazanof\NovofonApiV2\Entities\EmployeeGroupMember;

class EmployeeGroupMembersCollection extends Collection
{
    protected ?string $entityClass = EmployeeGroupMember::class;
}