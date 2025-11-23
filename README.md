# NK-025-2021 Parser

A PHP library to parse the NK-025-2021 medical classifications from [meddata.pp.ua](https://meddata.pp.ua/data/classifications/nk-025-2021.json).

## Installation

You can install the package via Composer:

```bash
composer require chernegasergiy/nk-025-2021-parser
```

## Usage

```php
<?php

require 'vendor/autoload.php';

use ChernegaSergiy\Nk0252021Parser\Parser;

$parser = new Parser();

try {
    $data = $parser->parse();
    print_r($data);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
```

## Contributing

Contributions are welcome and appreciated! Here's how you can contribute:

1. Fork the project
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

Please make sure to update tests as appropriate and adhere to the existing coding style.

## License

This project is licensed under the CSSM Unlimited License v2.0 (CSSM-ULv2). See the [LICENSE](LICENSE) file for details.
