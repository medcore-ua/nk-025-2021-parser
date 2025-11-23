# NK-025-2021 Parser

A PHP library to parse the NK-025-2021 medical classifications from [meddata.pp.ua](https://meddata.pp.ua/data/classifications/nk-025-2021.json).

## Installation

You can install the package via Composer:

```bash
composer require meddata/nk-025-2021-parser
```

## Usage

```php
<?php

require 'vendor/autoload.php';

use Meddata\Nk0252021Parser\Parser;

$parser = new Parser();

try {
    $data = $parser->parse();
    print_r($data);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
```

```