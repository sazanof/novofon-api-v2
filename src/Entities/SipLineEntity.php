<?php

namespace Sazanof\NovofonApiV2\Entities;

use Sazanof\NovofonApiV2\Collections\IpAddressCollection;

class SipLineEntity extends Entity
{
    public int $id;
    public string $status;
    public string $type;
    public int $dialTime;
    public int $employeeIdd;
    public string $phoneNumber;
    public string $billingState;
    public int $channelsCount;
    public string $physicalState;
    public string $employeeFullName;
    public string $virtualPhoneNumber;
    public string $virtualPhoneUsageRule;
    public IpAddressCollection $ipAddresses;

    protected function assignProperty($prop, $value): void
    {
        if ($prop === 'ipAddresses') {
            $collection = new IpAddressCollection();
            foreach ($value as $ipAddress) {
                $collection->add($ipAddress);
            }
            $this->$prop = $collection;
        } else {
            parent::assignProperty($prop, $value);
        }
    }
}