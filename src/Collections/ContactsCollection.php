<?php

namespace Sazanof\NovofonApiV2\Collections;

use Sazanof\NovofonApiV2\Entities\Contact;

/** @method Contact[] items() */
class ContactsCollection extends Collection
{

    protected ?string $entityClass = Contact::class;
}
