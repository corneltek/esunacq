Payment Library for ESUN ACQ
============================

[![Latest Stable Version](https://poser.pugx.org/corneltek/esunacq/version)](https://packagist.org/packages/corneltek/esunacq)
[![Latest Unstable Version](https://poser.pugx.org/corneltek/esunacq/v/unstable)](//packagist.org/packages/corneltek/esunacq)
[![Total Downloads](https://poser.pugx.org/corneltek/esunacq/downloads)](https://packagist.org/packages/corneltek/esunacq)

This payment library isn't tight coupled to the frameworks, models or db
connections, you can use this library to build up the forms, verify the
response separately.

Installation
-------------

```sh
composer require corneltek/esunacq
```

Usage
-------------

For the config variables, please check your documentation from Esunbank.


### AuthRequestBuilder

```php
use EsunBank\ACQ\AuthRequestBuilder;
use EsunBank\ACQ\TxnType;

$builder = new AuthRequestBuilder('MAC KEY', [
    'MID' => '...',
    'CID' => '...',
    'U'   => '/path/to/response',
]);
$formFields = $builder->formFields('ORDER' . time(), 200, TxnType::INSTALLMENT, $ic = '...', $bpf = '...');
```

### AuthResponseVerifier

```php
use EsunBank\ACQ\AuthResponseVerifier;
$verifier = new AuthResponseVerifier('MAC KEY', [
    'MID' => '...',
]);
$this->assertTrue($verifier->verify($_REQUEST));
```



See `examples` for more details.
