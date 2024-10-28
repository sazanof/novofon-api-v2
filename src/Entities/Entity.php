<?php

namespace Sazanof\NovofonApiV2\Entities;

use Sazanof\NovofonApiV2\Helpers\SnakeCamel;

class Entity implements IEntity
{
    public function __construct($data)
    {
        $this->fromArray($data);
    }

    protected function propertyExists(mixed $property, array $data): bool
    {
        return array_key_exists($property, $data);
    }

    public function fromArray(array $data): static
    {
        foreach ($data as $property => $value) {
            $prop = SnakeCamel::snakeToCamel($property);
            if (property_exists($this, $prop)) {
                $this->assignProperty($prop, $value);
            }
        }
        return $this;
    }

    protected function assignProperty($prop, $value): void
    {
        $this->$prop = $value;
    }
}