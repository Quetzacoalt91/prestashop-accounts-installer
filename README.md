# prestashop-accounts-installer

Checks if the mandatory ps_accounts module is properly installed and up to date. If the module is not installed, it will
present the installation link.


## Installation

This package is available on [Packagist](https://packagist.org/packages/prestashop/prestashop-accounts-installer), you can install it via [Composer](https://getcomposer.org).

```shell script
composer require prestashop/prestashop-accounts-installer
```

## How to use it 

### Installer

In your module main class `install` method. (Only works on prestashop 1.7 and above)

```php
    (new \PrestaShop\PsAccountsInstaller\Installer\Installer())->installPsAccounts();
```

### Presenter

For example in your main module's class `getContent` method.

```php
    Media::addJsDef([
        'contextPsAccounts' => (new \PrestaShop\PsAccountsInstaller\Presenter\ContextPresenter())
            ->Present($this->name),
    ]);
```