<?php

namespace Sazanof\NovofonApiV2\Builder;

class Filter
{
    public $filter;

    public function __construct(\Closure $closure = null)
    {
        if (is_callable($closure)) {
            $closure($this);
        }
    }

    public function rule(string $field, string $operator, string $value, \Closure $closure = null)
    {
        $this->filter = [
            'field' => $field,
            'operator' => $operator,
            'value' => $value,
        ];
        return $this;
    }

    public function group(\Closure $closure = null, string $condition = 'and')
    {
        $group = new FilterGroup($condition);
        $group->condition = $condition;
        if (is_callable($closure)) {
            $closure($group);
        }
        $this->filter = $group;
        return $this;
    }

    public function clear()
    {
        $this->filter = [];
    }
}