# Customize UI README
This package allows customizing back button in admin interface for Bagisto
## Requirements
- [Bagisto](https://github.com/bagisto/bagisto)

## Installation

### Install with composer
1. Run the following command
```php
composer require hunghbm/bagisto-customize-ui
```
2. Open config/app.php and add **Hunghbm\UI\Providers\UIServiceProvider::class**.
3. Run the following command
```php
composer dump-autoload
```

### Install with package folder
1. Unzip all the files to **packages/Hunghbm/UI**.
2. Open config/app.php and add **Hunghbm\UI\Providers\UIServiceProvider::class**.
3. Open composer.json and add **"Hunghbm\\UI\\": "packages/Hunghbm/UI/src"** to **psr-4**.
4. Run the following command
```php
composer dump-autoload
```
