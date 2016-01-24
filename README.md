# HttpModifier Component

[![Latest Version](https://img.shields.io/github/release/ThrusterIO/http-modifier.svg?style=flat-square)]
(https://github.com/ThrusterIO/http-modifier/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)]
(LICENSE)
[![Build Status](https://img.shields.io/travis/ThrusterIO/http-modifier.svg?style=flat-square)]
(https://travis-ci.org/ThrusterIO/http-modifier)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/ThrusterIO/http-modifier.svg?style=flat-square)]
(https://scrutinizer-ci.com/g/ThrusterIO/http-modifier)
[![Quality Score](https://img.shields.io/scrutinizer/g/ThrusterIO/http-modifier.svg?style=flat-square)]
(https://scrutinizer-ci.com/g/ThrusterIO/http-modifier)
[![Total Downloads](https://img.shields.io/packagist/dt/thruster/http-modifier.svg?style=flat-square)]
(https://packagist.org/packages/thruster/http-modifier)

[![Email](https://img.shields.io/badge/email-team@thruster.io-blue.svg?style=flat-square)]
(mailto:team@thruster.io)

The Thruster HttpModifier Component. Provides a backbone for modifying PSR-7 Request/Response for HTTP Clients/Servers and other utilities which uses PSR-7 standard. 

## Install

Via Composer

``` bash
$ composer require thruster/http-modifier
```

### For PHP < 7.0

For older PHP version than PHP7 there is branch **php5**

``` bash
$ composer require thruster/http-modifier ">=1.0,<2.0"
```

## Usage

There are four type of modifiers:

* ServerRequestModifierInterface
* RequestModifierInterface
* ResponseModifierInterface
* MessageModifierInterface

Each of them has own Collection to group them and run `modify` on each of modifier.

### Standalone modifier

```php
$modifier = new class implements ResponseModifierInterface {
	public function modify(ResponseInterface $response) : ResponseInterface
	{
		return $response->withHeader('X-Powered-By', 'Thruster/1.0');
	}
}

$response = $modifier->modify($response);
```

### Using collection

```php
$collection = new ResponseModifierCollection();
$collection->add(new ServerTimeModifier());
$collection->add(new PoweredByModifier('Thruster/1.0'));

$response = $collection->modify($response);
```

### Nesting collections

```php
$collectionA = new ResponseModifierCollection();
$collectionA->add(new ServerTimeModifier());
$collectionA->add(new PoweredByModifier('Thruster/1.0'));

$collectionB = new ResponseModifierCollection();
$collectionB->add($collectionA);

$response = $collectionB->modify($response);
```

## Testing

``` bash
$ composer test
```


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.


## License

Please see [License File](LICENSE) for more information.
