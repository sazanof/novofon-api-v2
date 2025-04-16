<?php

namespace Sazanof\NovofonApiV2\Entities;

use Sazanof\NovofonApiV2\Collections\EmployeeGroupMembersCollection;
use Sazanof\NovofonApiV2\Collections\EmployeeGroupPhoneNumbersCollection;

class EmployeeGroup extends Entity
{
    public int $id;
    public string $name;
    public EmployeeGroupMembersCollection $members;
    public EmployeeGroupPhoneNumbersCollection $phoneNumbers;

    protected function assignProperty($prop, $value): void
    {
        if ($prop === 'members') {
            $this->$prop = new EmployeeGroupMembersCollection();
            foreach ($value as $member) {
                $this->$prop->add($member);
            }
        } else if ($prop === 'phoneNumbers') {
            $this->$prop = new EmployeeGroupPhoneNumbersCollection();
            foreach ($value as $number) {
                $this->$prop->add($number);
            }
        } else {
            $this->$prop = $value;
        }
    }
}