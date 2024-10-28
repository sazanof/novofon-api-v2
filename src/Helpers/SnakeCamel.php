<?php

namespace Sazanof\NovofonApiV2\Helpers;

class SnakeCamel
{
    public static function camelToSnake($input): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
    }

    public static function snakeToCamel($input): string
    {
        return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $input))));
    }
}