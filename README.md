# TradeTrackerTest

install composer dependecies using command
```
composer install
```

package build for laravel hook with service provider src/Providers/TradeTrackerServiceProvider

## just add in config/app.php in your laravel project 
```php
Mg\TradeTracker\Providers\TradeTrackerServiceProvider::class,
```

folder src/Helpers contains products xml parser with ProductsParser class which includes many xml node parsers like in 
src/Helpers/Parser

folder theme contains angular5 application you can build angular applicatoin using command
```
ng build --op=app
```
