[![Stand With Ukraine](https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/banner-direct.svg)](https://stand-with-ukraine.pp.ua)

# NK-025-2021 Parser

[![Latest Stable Version](https://img.shields.io/packagist/v/medcore-ua/nk-025-2021-parser.svg?label=Packagist&logo=packagist)](https://packagist.org/packages/medcore-ua/nk-025-2021-parser)
[![Total Downloads](https://img.shields.io/packagist/dt/medcore-ua/nk-025-2021-parser.svg?label=Downloads&logo=packagist)](https://packagist.org/packages/medcore-ua/nk-025-2021-parser)
[![License](https://img.shields.io/packagist/l/medcore-ua/nk-025-2021-parser.svg?label=Licence&logo=open-source-initiative)](https://packagist.org/packages/medcore-ua/nk-025-2021-parser)

A PHP library to parse the NK-025-2021 medical classifications from [meddata.pp.ua](https://meddata.pp.ua/data/classifications/nk-025-2021.json).

## Installation

You can install the package via Composer:

```bash
composer require medcore-ua/nk-025-2021-parser
```

## Usage

The `parse()` method returns a `ClassificationCollection` object which you can iterate over, or use the finder methods to search for specific classifications.

### Basic Usage

```php
<?php

require 'vendor/autoload.php';

use MedCore\Nk0252021Parser\Parser;

$parser = new Parser();

try {
    $classifications = $parser->parse();

    // Iterate over all classifications
    foreach ($classifications as $classification) {
        echo $classification->name_ua . PHP_EOL;
    }

    // Get the total count
    echo "Total classifications: " . count($classifications) . PHP_EOL;

} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
```

### Finding a Classification

You can find a classification by its code or specific code.

```php
<?php

// ...

$cholera = $parser->findByCode('A00');
echo $cholera->name_ua; // Холера

$choleraBiotar = $parser->findBySpecificCode('A00.0');
echo $choleraBiotar->name_ua; // Холера, спричинена холерним вібріоном 01, biovar cholera
```

### Searching for Classifications

You can search for classifications by name (in either Ukrainian or English).

```php
<?php

// ...

$results = $parser->searchByName('тиф');

foreach ($results as $result) {
    echo $result->specific_code . ': ' . $result->specific_name_ua . PHP_EOL;
}
```

## Data Structure

Each `Classification` object contains:

- `class` — class (e.g., "I")
- `chapter` — chapter (e.g., "I. Certain infectious and parasitic diseases")
- `code_range` — code range (e.g., "A00-A09")
- `sub_category` — sub category (e.g., "Intestinal infectious diseases")
- `code` — code (e.g., "A00")
- `name_en` — English name (e.g., "Cholera")
- `name_ua` — Ukrainian name (e.g., "Холера")
- `specific_code` — specific code (e.g., "A00.0")
- `specific_name_en` — specific English name (e.g., "Cholera due to vibrio cholerae 01, biovar cholera")
- `specific_name_ua` — specific Ukrainian name (e.g., "Холера, спричинена холерним вібріоном 01, biovar cholera")

## Contributing

Contributions are welcome and appreciated! Here's how you can contribute:

1. Fork the project
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

Please make sure to update tests as appropriate and adhere to the existing coding style.

## License

This library is licensed under the CSSM Unlimited License v2.0 (CSSM-ULv2). See the [LICENSE](LICENSE) file for details.
