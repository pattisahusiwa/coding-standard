# xynhacs
> PHP standard for all Xynha projects


## Introduction
**XynhaCS** is a set of PHP sniffs based on PSR2 with some additional tweaks to fulfill our style.
This standard is intended to be used in Xynha PHP projects only.
However, you can use this standard if needed.



## Requirements
* PHP 5.5 or greater



## Installation
Add `xynhacs` repository to your `composer.json`
```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/xynha/xynhacs"
    }
]
```
then install the package.
```
composer require --dev xynha/xynhacs:@dev
```

It's also recommended to install [phpcodesniffer-composer-installer](https://github.com/Dealerdirect/phpcodesniffer-composer-installer) for easy installation of the standard.
```
composer require --dev dealerdirect/phpcodesniffer-composer-installer
```


## Usage
After installation, add `phpcs.xml` file to root of your project.
Add this content into your `phpcs.xml`
```xml
<?xml version="1.0" encoding="UTF-8"?>
<ruleset name="PHPTron">
    <description>XynhaCS coding standard</description>

    <config name="testVersion" value="5.4"/>

    <arg name="colors"/>
    <arg name="parallel" value="8"/>
    <arg value="psv"/>
    <arg name="extensions" value="php"/>

    <file>./src/</file>

    <exclude-pattern>./vendor/*</exclude-pattern>

    <rule ref="xynhacs"/>
</ruleset>
```

Run `phpcs` to validate your source code style.


## Maintainers
[<img src="https://avatars2.githubusercontent.com/u/11484016" title="pattisahusiwa" width="80" height="80">](https://github.com/pattisahusiwa)



## License
This code is licensed under MIT License. See [license](https://github.com/xynha/xynhacs/blob/master/LICENSE) file for more detail.
