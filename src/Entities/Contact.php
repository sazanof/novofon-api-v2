<?php

namespace Sazanof\NovofonApiV2\Entities;


use Sazanof\NovofonApiV2\Collections\GroupsCollection;

class Contact extends Entity
{

    public int $id;
    public string $lastName;
    public ?string $firstName;
    public ?string $patronymic;
    public ?string $fullName;

    /** @var string[] $emails */
    public ?array $emails;

    /** @var null|GroupsCollection<ContactGroup> $groups */
    public ?GroupsCollection $groups;

    /** @var string[] $phoneNumbers */
    public ?array $phoneNumbers;
    public ?string $personalManagerId;
    public ?string $personalManagerFullName;
    public ?string $organizationName;
    public ?string $organizationId;

    protected function assignProperty($prop, $value): void
    {
        if ($prop === 'groups') {
            $collection = new GroupsCollection();

            foreach ($value as $contactGroup) {
                $collection->add($contactGroup);
            }
            $this->$prop = $collection;
        } else {
            parent::assignProperty($prop, $value);
        }
    }
}

