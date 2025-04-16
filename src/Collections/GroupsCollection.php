<?php

namespace Sazanof\NovofonApiV2\Collections;

use Sazanof\NovofonApiV2\Entities\ContactGroup;

class GroupsCollection extends Collection
{
    /** @method ContactGroup[] items() */
    protected ?string $entityClass = ContactGroup::class;
}
