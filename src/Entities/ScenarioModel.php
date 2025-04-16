<?php

namespace Sazanof\NovofonApiV2\Entities;

class ScenarioModel extends Entity
{
    public int $id;
    public string $name;
    public array $virtualPhoneNumbers;
    public array $sites;
    public array $campaigns;
    public array $operations;
}