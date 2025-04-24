<?php

namespace Sazanof\NovofonApiV2\Entities;

class ScenarioOperation extends Entity
{
    public int $id;
    public string $name;

    public function __construct($data)
    {
        parent::__construct($data);
    }
}