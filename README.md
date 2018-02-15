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

folder theme contains angular5 application you can build angular applicatoin using command
```
ng build --op=app
```

# Xml parser solution

folder src/Helpers contains products xml parser with ProductsParser class which includes many xml node parsers like in 
src/Helpers/Parser

solution uses php XmlReader to read xml file url and registers several parsers for each unique node type
like TextParser for text with specific tag name

Available parsers 
```php
Mg\TradeTracker\Helpers\Parser\TextParser
Mg\TradeTracker\Helpers\Parser\UrlParser
Mg\TradeTracker\Helpers\Parser\PriceParser
Mg\TradeTracker\Helpers\Parser\NumberParser
Mg\TradeTracker\Helpers\Parser\CategoryParser
Mg\TradeTracker\Helpers\Parser\FieldParser
```

so you can implement your own parser

also there is stream function in ProductsParser class can be used to stream with web socket pushing with
callback function

# Docker image
```
https://hub.docker.com/r/yas500/tradetracker
```
