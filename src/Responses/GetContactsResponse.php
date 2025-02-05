<?php

namespace Sazanof\NovofonApiV2\Responses;

use Psr\Http\Message\ResponseInterface;
use Sazanof\NovofonApiV2\Collections\ContactsCollection;

class GetContactsResponse extends BaseResponse
{
    public ContactsCollection $contacts;

    public function __construct(ResponseInterface $response)
    {
        $this->contacts = new ContactsCollection();
        parent::__construct($response);
        foreach ($this->data as $contact) {
            $this->contacts->add($contact);
        }
    }
}
