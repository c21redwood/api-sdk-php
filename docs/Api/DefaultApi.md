# Redwood\DefaultApi

All URIs are relative to *https://localhost/api/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**geocodePost**](DefaultApi.md#geocodePost) | **POST** /geocode | Geocode the given address
[**officesGet**](DefaultApi.md#officesGet) | **GET** /offices | 
[**ssoAppsGet**](DefaultApi.md#ssoAppsGet) | **GET** /sso/apps | Get a list of the SSO apps


# **geocodePost**
> \Redwood\Models\Place geocodePost($address)

Geocode the given address

### Example
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

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **address** | **string**|  | [optional]

### Return type

[**\Redwood\Models\Place**](../Model/Place.md)

### Authorization

[passport](../../README.md#passport)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **officesGet**
> \Redwood\Models\Office[] officesGet()



### Example
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

try {
    $result = $apiInstance->officesGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->officesGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Redwood\Models\Office[]**](../Model/Office.md)

### Authorization

[passport](../../README.md#passport)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ssoAppsGet**
> \Redwood\Models\SsoApp[] ssoAppsGet()

Get a list of the SSO apps

### Example
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

try {
    $result = $apiInstance->ssoAppsGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->ssoAppsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Redwood\Models\SsoApp[]**](../Model/SsoApp.md)

### Authorization

[passport](../../README.md#passport)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

