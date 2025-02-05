<?php

namespace Sazanof\NovofonApiV2\Collections;

use Sazanof\NovofonApiV2\Entities\Contact;

class ContactsCollection extends Collection
{

    protected ?string $entityClass = Contact::class;

    /**
     * @return Contact[]
     */
    public function items(): array
    {
        return parent::items();
    }
}
