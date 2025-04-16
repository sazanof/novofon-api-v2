<?php

namespace Sazanof\NovofonApiV2\Collections;

use Sazanof\NovofonApiV2\Entities\ContactGroup;

/** @method ContactGroup[] items() */
class GroupsCollection extends Collection
{
    protected ?string $entityClass = ContactGroup::class;
}
