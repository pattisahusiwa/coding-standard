# xynhacs
Another PHP Coding Standard

## Installation
Install with composer
```
composer require --dev xynha/xynhacs
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

    <rule ref="xynhacs"/>
</ruleset>
```

Run `phpcs` to validate your source code style.


## License
See [license](https://github.com/xynha/xynhacs/blob/master/LICENSE) file.
