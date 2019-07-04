# Redwood\DefaultApi

All URIs are relative to *///api/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**geocodePost**](DefaultApi.md#geocodePost) | **POST** /geocode | Geocode the given address
[**listingsConnectionRefGet**](DefaultApi.md#listingsConnectionRefGet) | **GET** /listings/{connection}/{ref} | Get a Listing object from an MLS
[**officesGet**](DefaultApi.md#officesGet) | **GET** /offices | 
[**ssoAppsGet**](DefaultApi.md#ssoAppsGet) | **GET** /sso/apps | Get a list of the SSO apps
[**supportConnectionGuideIdGet**](DefaultApi.md#supportConnectionGuideIdGet) | **GET** /support/{connection}/guide/{id} | Get a guide based on its connection reference
[**usersRefGet**](DefaultApi.md#usersRefGet) | **GET** /users/{ref} | Get a user record

# **geocodePost**
> \Redwood\Models\Place geocodePost($address)

Geocode the given address

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: passport
$config = Redwood\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Redwood\Client\DefaultApi(
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
 **address** | [**string**](../Model/.md)|  | [optional]

### Return type

[**\Redwood\Models\Place**](../Model/Place.md)

### Authorization

[passport](../../README.md#passport)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listingsConnectionRefGet**
> \Redwood\Models\Listing listingsConnectionRefGet($connection, $ref, $field)

Get a Listing object from an MLS

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: passport
$config = Redwood\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Redwood\Client\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$connection = "connection_example"; // string | The MLS connection name
$ref = "ref_example"; // string | The ref to use to do the lookup
$field = "field_example"; // string | The field to do the lookup against

try {
    $result = $apiInstance->listingsConnectionRefGet($connection, $ref, $field);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->listingsConnectionRefGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **connection** | **string**| The MLS connection name |
 **ref** | **string**| The ref to use to do the lookup |
 **field** | **string**| The field to do the lookup against | [optional]

### Return type

[**\Redwood\Models\Listing**](../Model/Listing.md)

### Authorization

[passport](../../README.md#passport)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **officesGet**
> \Redwood\Models\Office[] officesGet()



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: passport
$config = Redwood\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Redwood\Client\DefaultApi(
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
 - **Accept**: */*

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

$apiInstance = new Redwood\Client\DefaultApi(
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
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supportConnectionGuideIdGet**
> \Redwood\Models\Guide supportConnectionGuideIdGet($connection, $id)

Get a guide based on its connection reference

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: passport
$config = Redwood\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Redwood\Client\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$connection = "connection_example"; // string | The name of the connection (source)
$id = "id_example"; // string | The ID of the connected guide (third-party primary key)

try {
    $result = $apiInstance->supportConnectionGuideIdGet($connection, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->supportConnectionGuideIdGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **connection** | **string**| The name of the connection (source) |
 **id** | **string**| The ID of the connected guide (third-party primary key) |

### Return type

[**\Redwood\Models\Guide**](../Model/Guide.md)

### Authorization

[passport](../../README.md#passport)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **usersRefGet**
> \Redwood\Models\User usersRefGet($ref, $field)

Get a user record

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: passport
$config = Redwood\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Redwood\Client\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ref = 56; // int | The reference value to query for
$field = "field_example"; // string | The field to query against

try {
    $result = $apiInstance->usersRefGet($ref, $field);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->usersRefGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ref** | **int**| The reference value to query for |
 **field** | **string**| The field to query against | [optional]

### Return type

[**\Redwood\Models\User**](../Model/User.md)

### Authorization

[passport](../../README.md#passport)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

