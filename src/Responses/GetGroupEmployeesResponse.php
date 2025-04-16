<?php

namespace Sazanof\NovofonApiV2\Responses;

use Psr\Http\Message\ResponseInterface;
use Sazanof\NovofonApiV2\Collections\EmployeeGroupCollection;

class GetGroupEmployeesResponse extends BaseResponse
{
    public EmployeeGroupCollection $groups;

    public function __construct(ResponseInterface $response)
    {
        $this->groups = new EmployeeGroupCollection();
        parent::__construct($response);
        foreach ($this->data as $group) {
            $this->groups->add($group);
        }
    }
}