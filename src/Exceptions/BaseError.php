<?php

namespace Sazanof\NovofonApiV2\Exceptions;

class BaseError extends \Exception
{
    public $code;
    public $message;
    public string $mnemonic;
    public string $field;
    public string $value;
    public array $params;

    public function __construct(array $error)
    {
        parent::__construct($error['message'], $error['code']);
        $this->code = $error['code'] ?? 0;
        $this->message = $error['message'] ?? '';
        $this->mnemonic = $error['data']['mnemonic'] ?? '';
        $this->field = $error['data']['field'] ?? '';
        $this->value = $error['data']['value'] ?? '';
        $this->params = $error['data']['params'] ?? [];
    }
}