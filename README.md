
This library provides an API to use bitaps.com services.

Install with Composer
------------
Add `abgit/bitaps` as a dependency and run composer update:

```
"require": {
    ...
    "abgit/bitaps" : "0.1.*"
    ...
}
```


Market API:

```php
<?php

// import dependencies
require 'vendor/autoload.php';

// get the bitaps class instance
$bitaps = new bitaps\market();

// Tickers - Average price
$price = $bitaps->averagePrice();

// Tickers - Ticker list
$list = $bitaps->tickerList(); 
```

