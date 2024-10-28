<?php

namespace Sazanof\NovofonApiV2\Builder;

use Sazanof\NovofonApiV2\Collections\Collection;
use Sazanof\NovofonApiV2\Exceptions\ReflectionException;

class Sort extends Collection
{
    /** @var SortItem[] $items */
    public array $items = [];

    public const string ASC = 'asc';
    public const string DESC = 'desc';

    public function add(mixed $item, ...$args): static
    {
        $field = $item;
        $direction = $args[0];
        $this->items[] = new SortItem($field, $direction);
        return $this;
    }

}