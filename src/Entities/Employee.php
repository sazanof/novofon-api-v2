<?php

namespace Sazanof\NovofonApiV2\Entities;

class Employee extends Entity
{
    public int $id;
    public ?string $login;
    public ?string $firstName;
    public ?string $lastName;
    public ?string $patronymic;
    public ?string $fullName;
    public ?int $statusId;
    public ?bool $callsAvailable;
    public ?array $allowedInCallTypes;
    public ?array $inExternalAllowedCallDirections;
    public ?array $inInternalAllowedCallDirections;
    public ?array $allowedOutCallTypes;
    public ?array $outExternalAllowedCallDirections;
    public ?array $outInternalAllowedCallDirections;
    public ?string $email;
    public ?string $callRecording;
    public ?string $scheduleId;
    public ?string $scheduleName;

    public ?Extension $extension;

    protected function assignProperty($prop, $value): void
    {
        if ($prop === 'extension') {
            $extension = new Extension($value);
            $this->$prop = $extension;
        } else {
            parent::assignProperty($prop, $value);
        }
    }

}