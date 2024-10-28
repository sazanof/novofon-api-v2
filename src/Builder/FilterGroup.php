<?php

namespace Sazanof\NovofonApiV2\Builder;

class FilterGroup
{
    public array $filters = [];

    public string $condition = '';

    public function __construct(string $condition = '')
    {
        $this->condition = $condition;
    }

    public function and(\Closure $closure = null)
    {
        $this->condition = 'and';

        if (is_callable($closure)) {
            $closure($this);
        }

        return $this;
    }

    public function or(\Closure $closure = null)
    {
        $this->condition = 'or';
        if (is_callable($closure)) {
            $closure($this);
        }

        return $this;
    }

    public function add(string $field, string $condition, mixed $value)
    {
        $this->filters[] = new FilterRule($field, $condition, $value);
    }

    public function group(\Closure $closure = null, string $condition = 'and')
    {
        $group = new self();
        $this->condition = $condition;

        if (is_callable($closure)) {
            $closure($group);
        }
        $this->filters[] = $group;
        return $this;
    }
}