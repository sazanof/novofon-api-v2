<?php

namespace Sazanof\NovofonApiV2\Builder;

class SortItem
{
    public string $field;
    public string $order;

    public function __construct(string $field, string $order)
    {
        $this->field = $field;
        $this->order = $order;
    }
}