# PHP coding standard based on PSR-12

[![Packagist License](https://img.shields.io/packagist/l/pattisahusiwa/coding-standard)](https://github.com/pattisahusiwa/coding-standard/blob/master/LICENSE)
[![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/pattisahusiwa/coding-standard)](https://php.net/)
[![Packagist Version](https://img.shields.io/packagist/v/pattisahusiwa/coding-standard?label=latest)](https://github.com/pattisahusiwa/coding-standard/releases)

> Another PHP Coding Standard for PHP_CodeSniffer based on `PSR-12` with some exceptions and additions.

- [PHP coding standard based on PSR-12](#php-coding-standard-based-on-psr-12)
  - [Deprecated](#deprecated)
  - [Installation](#installation)
  - [Usage](#usage)
  - [Coding style](#coding-style)
  - [License](#license)

## Deprecated
Please use [asispts/ptscs](https://github.com/asispts/ptscs)

## Installation
Install with composer
```
composer require --dev pattisahusiwa/coding-standard
```

## Usage
After installation, create `phpcs.xml` or `phpcs.xml.dist` file in the root of your project and
add this code,
```xml
<?xml version="1.0" encoding="UTF-8"?>
<ruleset>
    <arg name="colors"/>
    <arg name="parallel" value="8"/>
    <arg value="psv"/>
    <arg name="extensions" value="php"/>

  <file>src</file>
  <file>tests</file>

  <exclude-pattern>vendor</exclude-pattern>

  <rule ref="ptscs"/>
</ruleset>
```
Run `phpcs` to validate your source code style and `phpcbf` to fix the violations.

## Coding style

Examples of all coding style can be found at `/tests/**/_data/*.php.fixed`.
Here is an example of a class declaration.
```php
<?php declare(strict_types=1);

namespace Ptscs\Tests;

use ParentClass;
use SomeInterface;

final class Classes extends ParentClass implements SomeInterface
{
    use sometrait;

    /**
     * @var object
     */
    private $obj1;

    /**
     * @var object
     */
    private $obj2;

    /**
     * @var string[]
     */
    private $data = [];

    // Example of multiline function arguments
    public function __construct(
        object $obj1,
        object $obj2
    ) {
        $this->obj1 = $obj1;
        $this->obj2 = $obj2;
    }

    public function setData(string $key, string $value): void
    {
        $this->data[$key] = $value;
    }

    public function getData(string $key): string
    {
        if (array_key_exists($key, $this->data) === true) {
            return $this->data[$key];
        }

        return '';
    }
}
```


## License
Released under [MIT License](https://opensource.org/licenses/MIT).
See [LICENSE](https://github.com/pattisahusiwa/coding-standard/blob/master/LICENSE) file.
