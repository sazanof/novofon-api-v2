<?php

namespace Sazanof\NovofonApiV2\Collections;

use Sazanof\NovofonApiV2\Exceptions\ReflectionException;

class Collection
{
    protected array $items = [];
    protected ?string $entityClass = null;

    /**
     * @throws ReflectionException
     */
    public function add(mixed $item): static
    {
        if (is_null($this->entityClass)) {
            throw new ReflectionException('Entity class not set');
        }
        if (is_array($item)) {
            try {
                $entity = new \ReflectionClass($this->entityClass);
                $instance = $entity->newInstanceArgs([$item]);
                $this->items[] = $instance;
            } catch (\ReflectionException $e) {
                throw new ReflectionException('Error creating entity class');
            }

        }

        return $this;
    }

    public function remove(mixed $item): static
    {
        array_splice($this->items, $item, 1);
        return $this;
    }

    public function find(mixed $item): mixed
    {
        return array_search($item, $this->items, true);
    }

    public function items(): array
    {
        return $this->items;
    }

    public function toArray(): array
    {
        return json_decode(json_encode($this->items), true);
    }

    public function count()
    {
        return count($this->items);
    }
}