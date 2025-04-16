<?php

namespace Sazanof\NovofonApiV2\Entities;

class EmployeeGroupPhoneNumber extends Entity
{
    public bool $available;
    public int $employeeId;
    public ?string $employeeFullName;
    public int $phoneInEmployeeId;
    public ?string $employeePhoneNumber;
    public int $employeePhoneNumberId;


}