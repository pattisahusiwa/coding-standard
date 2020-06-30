# phpcodeconv - PHP Coding Convention

[![Packagist License](https://img.shields.io/packagist/l/pattisahusiwa/phpcodeconv)](https://github.com/pattisahusiwa/phpcodeconv/blob/master/LICENSE)
[![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/pattisahusiwa/phpcodeconv)](https://php.net/)
[![Packagist Version](https://img.shields.io/packagist/v/pattisahusiwa/phpcodeconv?label=latest)](https://github.com/pattisahusiwa/phpcodeconv/releases)

Another PHP Coding Standard for PHP_CodeSniffer

## Installation
Install with composer
```
composer require --dev pattisahusiwa/phpcodeconv
```

## Usage
After installation, add `phpcs.xml` file to root of your project.
Add this content into your `phpcs.xml`
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

    <rule ref="phpcodeconv"/>
</ruleset>
```

Run `phpcs` to validate your source code style.


## License
See [license](https://github.com/pattisahusiwa/phpcodeconv/blob/master/LICENSE) file.
