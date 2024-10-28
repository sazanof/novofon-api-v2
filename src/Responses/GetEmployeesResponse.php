<?php

namespace Sazanof\NovofonApiV2\Responses;

use Psr\Http\Message\ResponseInterface;
use Sazanof\NovofonApiV2\Collections\EmployeeCollection;
use Sazanof\NovofonApiV2\Collections\VirtualNumberCollection;

class GetEmployeesResponse extends BaseResponse
{
    public EmployeeCollection $employees;

    public function __construct(ResponseInterface $response)
    {
        $this->employees = new EmployeeCollection();
        parent::__construct($response);
        foreach ($this->data as $employee) {
            $this->employees->add($employee);
        }
    }
}