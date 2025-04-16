<?php

namespace Sazanof\NovofonApiV2\Entities;

class Status extends Entity
{
    public int $id;
    public string $name;
    public ?string $description;
    public ?string $color;
    public ?int $priority;
    public ?bool $isDeleted;
    public ?bool $isWorktime;
    public ?string $mnemonic;
    public ?string $iconMnemonic;
    public ?array $allowedPhoneProtocols;

}