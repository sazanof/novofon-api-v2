# Библиотека для работы с обновленной платформой Novofon 2.0 на PHP

## Установка

`composer require sazanof/novofon-api-v2`

## Инициализация

```php
require 'vendor/autoload.php';
use Sazanof\NovofonApiV2\NovofonDataApi;
$app = NovofonDataApi::initialize('appid', 'token');
```

## Фильтрация

Простая

```php
$app->filter->rule('phone_number', '=', '123456');
```

Сложная

```php
/** FILTER FOR SIP LINES */
$app->filter->group(function (\Sazanof\NovofonApiV2\Builder\FilterGroup $group) {
    $group->or(function (\Sazanof\NovofonApiV2\Builder\FilterGroup $group) {
        $group->add('phone_number', '=', '123456');
        $group->add('phone_number', '!=', '666');
        $group->or(function (\Sazanof\NovofonApiV2\Builder\FilterGroup $group) {
            $group->add('phone_number', '=', '777');
            $group->add('phone_number', '=', '9999');
        });
    });
}, 'and');
```

## Сортировка результатов

```php
$app->orderBy('employee_id', \Sazanof\NovofonApiV2\Builder\Sort::DESC);
```

## Ограничение результатов

```php
$app
    ->setLimit(10)
    ->setOffset(5)
    ->removeLimit()
    ->removeOffset();
```

# Методы

_По мере разработки, список поддерживаемых методов будет пополняться. Доступные методы можно найти в классе
NovofonDataAp.php_

# Сущности

Каждый метод возвращает объект ответа, наследуемый от класса BaseResponse, содержащий коллекцию с классами сущностей.

```php
try {
    foreach ($app->getSipLines()->lines->items() as $item) {
        dump($item->phoneNumber);
    }
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    //
} catch (\Sazanof\NovofonApiV2\Exceptions\BaseError $e) {
    // 
}
// OR
foreach ($app->setLimit(10)->setOffset(33)->getEmployees()->employees->items() as $item) {
        dump($item->extension);
}
```

# Обработка ошибок

Каждый метод при может выдавать исключение BaseError, содержащий класс ошибки, переданный из API Novofon 2.0, согласно
документации