<?php

namespace Sazanof\NovofonApiV2\Builder;

class FilterRule
{
    public string $field;

    public string $operator;
    public mixed $value;

    public function __construct(mixed $field, mixed $operator, mixed $value)
    {
        $this->field = $field;
        $this->operator = $operator;
        $this->value = $value;

    }
}