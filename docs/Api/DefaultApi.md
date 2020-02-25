# Redwood\DefaultApi

All URIs are relative to *///api/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**contactsEmailGet**](DefaultApi.md#contactsEmailGet) | **GET** /contacts/email | Get a Contact by email
[**contactsIdGet**](DefaultApi.md#contactsIdGet) | **GET** /contacts/{id} | Get a Contact by ID
[**contactsPost**](DefaultApi.md#contactsPost) | **POST** /contacts | Create a Contact in the CRM
[**geocodePost**](DefaultApi.md#geocodePost) | **POST** /geocode | Geocode the given address
[**listingsConnectionPost**](DefaultApi.md#listingsConnectionPost) | **POST** /listings/{connection} | Create a  draft Listing object in the given MLS
[**listingsConnectionRefGet**](DefaultApi.md#listingsConnectionRefGet) | **GET** /listings/{connection}/{ref} | Get a Listing object from an MLS
[**listingsHashedIdGet**](DefaultApi.md#listingsHashedIdGet) | **GET** /listings/{hashedId} | Get a Listing object by hashed ID
[**meGet**](DefaultApi.md#meGet) | **GET** /me | Get data about the authenticated user
[**officesConnectionRefStatsGet**](DefaultApi.md#officesConnectionRefStatsGet) | **GET** /offices/{connection}/{ref}/stats | 
[**officesGet**](DefaultApi.md#officesGet) | **GET** /offices | 
[**officesStatsGet**](DefaultApi.md#officesStatsGet) | **GET** /offices/stats | 
[**rolesGet**](DefaultApi.md#rolesGet) | **GET** /roles | Get a list of all Roles and counts of Users in each
[**ssoAppsGet**](DefaultApi.md#ssoAppsGet) | **GET** /sso/apps | Get a list of the SSO apps
[**ssoAppsIdGet**](DefaultApi.md#ssoAppsIdGet) | **GET** /sso/apps/{id} | Get a single SSO App
[**supportConnectionGuideIdGet**](DefaultApi.md#supportConnectionGuideIdGet) | **GET** /support/{connection}/guide/{id} | Get a guide based on its connection reference
[**usersRefGet**](DefaultApi.md#usersRefGet) | **GET** /users/{ref} | Get a user record
[**valuationsAnalyzePost**](DefaultApi.md#valuationsAnalyzePost) | **POST** /valuations/analyze | Get a ValueAnalysis for the given address or place
[**valuationsReportsDynamicPost**](DefaultApi.md#valuationsReportsDynamicPost) | **POST** /valuations/reports/dynamic | Get a DynamicReport for the given address or place
[**valuationsReportsStaticPost**](DefaultApi.md#valuationsReportsStaticPost) | **POST** /valuations/reports/static | Get a StaticReport for the given address or place

# **contactsEmailGet**
> \Redwood\Models\Contact contactsEmailGet($email)

Get a Contact by email

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
$email = "email_example"; // string | 

try {
    $result = $apiInstance->contactsEmailGet($email);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->contactsEmailGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **email** | **string**|  |

### Return type

[**\Redwood\Models\Contact**](../Model/Contact.md)

### Authorization

[passport](../../README.md#passport)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **contactsIdGet**
> \Redwood\Models\Contact contactsIdGet($id)

Get a Contact by ID

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
$id = "id_example"; // string | 

try {
    $result = $apiInstance->contactsIdGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->contactsIdGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**|  |

### Return type

[**\Redwood\Models\Contact**](../Model/Contact.md)

### Authorization

[passport](../../README.md#passport)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **contactsPost**
> \Redwood\Models\Contact contactsPost($body)

Create a Contact in the CRM

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
$body = new \stdClass; // object | The contact data

try {
    $result = $apiInstance->contactsPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->contactsPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**object**](../Model/object.md)| The contact data |

### Return type

[**\Redwood\Models\Contact**](../Model/Contact.md)

### Authorization

[passport](../../README.md#passport)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **geocodePost**
> \Redwood\Models\Place geocodePost($address, $flush, $connection)

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
$flush = True; // bool | 
$connection = "connection_example"; // string | 

try {
    $result = $apiInstance->geocodePost($address, $flush, $connection);
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
 **flush** | [**bool**](../Model/.md)|  | [optional]
 **connection** | [**string**](../Model/.md)|  | [optional]

### Return type

[**\Redwood\Models\Place**](../Model/Place.md)

### Authorization

[passport](../../README.md#passport)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listingsConnectionPost**
> \Redwood\Models\Listing listingsConnectionPost($connection)

Create a  draft Listing object in the given MLS

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
$connection = "connection_example"; // string | The Listings connection name

try {
    $result = $apiInstance->listingsConnectionPost($connection);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->listingsConnectionPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **connection** | **string**| The Listings connection name |

### Return type

[**\Redwood\Models\Listing**](../Model/Listing.md)

### Authorization

[passport](../../README.md#passport)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listingsConnectionRefGet**
> \Redwood\Models\Listing listingsConnectionRefGet($connection, $ref)

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
$connection = "connection_example"; // string | The Listings connection name
$ref = "ref_example"; // string | The ref to use to do the lookup

try {
    $result = $apiInstance->listingsConnectionRefGet($connection, $ref);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->listingsConnectionRefGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **connection** | **string**| The Listings connection name |
 **ref** | **string**| The ref to use to do the lookup |

### Return type

[**\Redwood\Models\Listing**](../Model/Listing.md)

### Authorization

[passport](../../README.md#passport)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listingsHashedIdGet**
> \Redwood\Models\Listing listingsHashedIdGet($hashed_id)

Get a Listing object by hashed ID

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
$hashed_id = "hashed_id_example"; // string | The hashed ID of the listing

try {
    $result = $apiInstance->listingsHashedIdGet($hashed_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->listingsHashedIdGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **hashed_id** | **string**| The hashed ID of the listing |

### Return type

[**\Redwood\Models\Listing**](../Model/Listing.md)

### Authorization

[passport](../../README.md#passport)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **meGet**
> \Redwood\Models\User meGet()

Get data about the authenticated user

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
    $result = $apiInstance->meGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->meGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Redwood\Models\User**](../Model/User.md)

### Authorization

[passport](../../README.md#passport)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **officesConnectionRefStatsGet**
> object officesConnectionRefStatsGet($connection, $ref, $field)



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
$connection = "connection_example"; // string | The MLS connection to query
$ref = "ref_example"; // string | The reference value of the office
$field = "field_example"; // string | The field to query; defaults to mls_key

try {
    $result = $apiInstance->officesConnectionRefStatsGet($connection, $ref, $field);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->officesConnectionRefStatsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **connection** | **string**| The MLS connection to query |
 **ref** | **string**| The reference value of the office |
 **field** | **string**| The field to query; defaults to mls_key | [optional]

### Return type

**object**

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

# **officesStatsGet**
> object officesStatsGet()



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
    $result = $apiInstance->officesStatsGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->officesStatsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

**object**

### Authorization

[passport](../../README.md#passport)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **rolesGet**
> \Redwood\Models\Role[] rolesGet()

Get a list of all Roles and counts of Users in each

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
    $result = $apiInstance->rolesGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->rolesGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Redwood\Models\Role[]**](../Model/Role.md)

### Authorization

[passport](../../README.md#passport)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ssoAppsGet**
> \Redwood\Models\App[] ssoAppsGet($connection, $flush)

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
$connection = "connection_example"; // string | The name of the connection
$flush = true; // bool | Flush the cache of SSO apps

try {
    $result = $apiInstance->ssoAppsGet($connection, $flush);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->ssoAppsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **connection** | **string**| The name of the connection | [optional]
 **flush** | **bool**| Flush the cache of SSO apps | [optional]

### Return type

[**\Redwood\Models\App[]**](../Model/App.md)

### Authorization

[passport](../../README.md#passport)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ssoAppsIdGet**
> \Redwood\Models\App[] ssoAppsIdGet($id, $connection)

Get a single SSO App

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
$id = "id_example"; // string | The ID of the app
$connection = "connection_example"; // string | The name of the connection

try {
    $result = $apiInstance->ssoAppsIdGet($id, $connection);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->ssoAppsIdGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The ID of the app |
 **connection** | **string**| The name of the connection | [optional]

### Return type

[**\Redwood\Models\App[]**](../Model/App.md)

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

# **valuationsAnalyzePost**
> \Redwood\Models\ValueAnalysis valuationsAnalyzePost($address, $place_id)

Get a ValueAnalysis for the given address or place

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
$place_id = "place_id_example"; // string | 

try {
    $result = $apiInstance->valuationsAnalyzePost($address, $place_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->valuationsAnalyzePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **address** | [**string**](../Model/.md)|  | [optional]
 **place_id** | [**string**](../Model/.md)|  | [optional]

### Return type

[**\Redwood\Models\ValueAnalysis**](../Model/ValueAnalysis.md)

### Authorization

[passport](../../README.md#passport)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **valuationsReportsDynamicPost**
> \Redwood\Models\DynamicReport valuationsReportsDynamicPost($address, $place_id)

Get a DynamicReport for the given address or place

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
$place_id = "place_id_example"; // string | 

try {
    $result = $apiInstance->valuationsReportsDynamicPost($address, $place_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->valuationsReportsDynamicPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **address** | [**string**](../Model/.md)|  | [optional]
 **place_id** | [**string**](../Model/.md)|  | [optional]

### Return type

[**\Redwood\Models\DynamicReport**](../Model/DynamicReport.md)

### Authorization

[passport](../../README.md#passport)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **valuationsReportsStaticPost**
> \Redwood\Models\StaticReport valuationsReportsStaticPost($address, $place_id)

Get a StaticReport for the given address or place

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
$place_id = "place_id_example"; // string | 

try {
    $result = $apiInstance->valuationsReportsStaticPost($address, $place_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->valuationsReportsStaticPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **address** | [**string**](../Model/.md)|  | [optional]
 **place_id** | [**string**](../Model/.md)|  | [optional]

### Return type

[**\Redwood\Models\StaticReport**](../Model/StaticReport.md)

### Authorization

[passport](../../README.md#passport)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

