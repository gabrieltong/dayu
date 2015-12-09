# DaYu

How to send sms
```php
$record = `model`;
$dayu = DaYu->createByDayuable($record);
$dayu->config($ak,$sk);
$dayu->send();
```

You can publish the migration with:
```bash
php artisan vendor:publish --provider="Gabe\Dayu\DayuServiceProvider" --tag="migrations"
```

