<?php

namespace Sazanof\NovofonApiV2\Entities;

use Sazanof\NovofonApiV2\Collections\ScenariosCollection;

class VirtualNumber extends Entity
{
    public int $id;
    public ?string $name;
    public ?string $type;
    public ?string $prefix;
    public ?string $status;
    public ?string $comment;
    public ?string $category;
    public ?array $campaigns;
    public ?ScenariosCollection $scenarios;
    public ?string $activationDate;
    public ?string $virtualPhoneNumber;
    public ?string $redirectionPhoneNumber;
    public ?string $numberCapacityChoiceRuleNames;

    protected function assignProperty($prop, $value): void
    {
        if ($prop === 'scenarios') {
            $this->scenarios = new ScenariosCollection();
            foreach ($value as $scenario) {
                $this->scenarios->add($scenario);
            }
        } else {
            parent::assignProperty($prop, $value);
        }
    }
}