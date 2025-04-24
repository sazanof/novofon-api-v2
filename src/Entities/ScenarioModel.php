<?php

namespace Sazanof\NovofonApiV2\Entities;

use Sazanof\NovofonApiV2\Collections\ScenarioOperationCollection;

class ScenarioModel extends Entity
{
    public int $id;
    public string $name;
    public array $virtualPhoneNumbers;
    public array $sites;
    public array $campaigns;
    public ScenarioOperationCollection $operations;

    protected function assignProperty($prop, $value): void
    {
        if ($prop === 'operations') {
            $operations = new ScenarioOperationCollection();
            foreach ($value as $operation) {
                $operations->add($operation);
            }
            $this->$prop = $operations;
        } else {
            parent::assignProperty($prop, $value);
        }
    }
}