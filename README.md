# c21-api-sdk-php
No description provided (generated by Swagger Codegen https://github.com/swagger-api/swagger-codegen)

This PHP package is automatically generated by the [Swagger Codegen](https://github.com/swagger-api/swagger-codegen) project:

- API version: 1.0
- Package version: 1.0.0
- Build package: io.swagger.codegen.languages.PhpClientCodegen

## Requirements

PHP 5.5 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/c21redwood/c21-api-sdk-php.git"
    }
  ],
  "require": {
    "c21redwood/c21-api-sdk-php": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/c21-api-sdk-php/vendor/autoload.php');
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: passport
$config = Redwood\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Redwood\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$address = "address_example"; // string | 

try {
    $result = $apiInstance->geocodePost($address);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->geocodePost: ', $e->getMessage(), PHP_EOL;
}

?>
```

## Documentation for API Endpoints

All URIs are relative to *https://localhost/api/v1*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*DefaultApi* | [**geocodePost**](docs/Api/DefaultApi.md#geocodepost) | **POST** /geocode | Geocode the given address
*DefaultApi* | [**officesGet**](docs/Api/DefaultApi.md#officesget) | **GET** /offices | 
*DefaultApi* | [**ssoAppsGet**](docs/Api/DefaultApi.md#ssoappsget) | **GET** /sso/apps | Get a list of the SSO apps


## Documentation For Models

 - [Error](docs/Model/Error.md)
 - [InlineResponse401](docs/Model/InlineResponse401.md)
 - [Office](docs/Model/Office.md)
 - [Place](docs/Model/Place.md)
 - [SsoApp](docs/Model/SsoApp.md)
 - [User](docs/Model/User.md)


## Documentation For Authorization


## passport

- **Type**: OAuth
- **Flow**: password
- **Authorization URL**: 
- **Scopes**: N/A


## Author




