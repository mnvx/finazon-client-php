# Swagger\Client\ReferenceApi

All URIs are relative to *https://api.finazon.io/v1.2/*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getApiUsage**](ReferenceApi.md#getapiusage) | **GET** /api_usage | Api usage
[**getDatasets**](ReferenceApi.md#getdatasets) | **GET** /datasets | List of Finazon datasets
[**getExchangesCrypto**](ReferenceApi.md#getexchangescrypto) | **GET** /markets/crypto | List of crypto markets
[**getExchangesStocks**](ReferenceApi.md#getexchangesstocks) | **GET** /markets/stocks | List of stock markets
[**getMarketCenter**](ReferenceApi.md#getmarketcenter) | **GET** /sip/market_center | List of market centers
[**getPublishers**](ReferenceApi.md#getpublishers) | **GET** /publishers | List of Finazon publishers
[**getSymbolsCrypto**](ReferenceApi.md#getsymbolscrypto) | **GET** /tickers/crypto | List of crypto pairs
[**getSymbolsForex**](ReferenceApi.md#getsymbolsforex) | **GET** /tickers/forex | List of forex ticker symbols
[**getSymbolsStocks**](ReferenceApi.md#getsymbolsstocks) | **GET** /tickers/stocks | List of stock ticker symbols
[**getSymbolsUSStocks**](ReferenceApi.md#getsymbolsusstocks) | **GET** /tickers/us_stocks | List of US stock ticker symbols

# **getApiUsage**
> \Swagger\Client\Model\ApiUsageResponseBody getApiUsage($product)

Api usage

Returns a list of datasets with available API calls and limits.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\ReferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$product = "product_example"; // string | Product code

try {
    $result = $apiInstance->getApiUsage($product);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReferenceApi->getApiUsage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **product** | **string**| Product code | [optional]

### Return type

[**\Swagger\Client\Model\ApiUsageResponseBody**](../Model/ApiUsageResponseBody.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getDatasets**
> \Swagger\Client\Model\DatasetsResponseBody getDatasets($code, $page, $page_size)

List of Finazon datasets

Returns a list of all datasets available at Finazon.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\ReferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$code = "code_example"; // string | Filter by Finazon's dataset code
$page = 56; // int | Specific page of a paginated result to be displayed
$page_size = 1000; // int | Number of items displayed per page in a paginated result

try {
    $result = $apiInstance->getDatasets($code, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReferenceApi->getDatasets: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **code** | **string**| Filter by Finazon&#x27;s dataset code | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 1000]

### Return type

[**\Swagger\Client\Model\DatasetsResponseBody**](../Model/DatasetsResponseBody.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getExchangesCrypto**
> \Swagger\Client\Model\ExchangesCryptoResponseBody getExchangesCrypto($page, $page_size)

List of crypto markets

Returns a list of supported crypto markets.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\ReferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 56; // int | Specific page of a paginated result to be displayed
$page_size = 1000; // int | Number of items displayed per page in a paginated result

try {
    $result = $apiInstance->getExchangesCrypto($page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReferenceApi->getExchangesCrypto: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **page** | **int**| Specific page of a paginated result to be displayed | [optional]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 1000]

### Return type

[**\Swagger\Client\Model\ExchangesCryptoResponseBody**](../Model/ExchangesCryptoResponseBody.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getExchangesStocks**
> \Swagger\Client\Model\ExchangesStocksResponseBody getExchangesStocks($country, $name, $code, $page, $page_size)

List of stock markets

Returns a list of supported stock markets.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\ReferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$country = "country_example"; // string | Filter by ISO 3166 alpha-2 code
$name = "name_example"; // string | Filter by market name
$code = "code_example"; // string | Filter by market identifier code (MIC) under ISO 10383 standard
$page = 56; // int | Specific page of a paginated result to be displayed
$page_size = 1000; // int | Number of items displayed per page in a paginated result

try {
    $result = $apiInstance->getExchangesStocks($country, $name, $code, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReferenceApi->getExchangesStocks: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **country** | **string**| Filter by ISO 3166 alpha-2 code | [optional]
 **name** | **string**| Filter by market name | [optional]
 **code** | **string**| Filter by market identifier code (MIC) under ISO 10383 standard | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 1000]

### Return type

[**\Swagger\Client\Model\ExchangesStocksResponseBody**](../Model/ExchangesStocksResponseBody.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getMarketCenter**
> \Swagger\Client\Model\MarketCenterResponseBody getMarketCenter()

List of market centers

Returns a list of market centers.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\ReferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getMarketCenter();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReferenceApi->getMarketCenter: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\MarketCenterResponseBody**](../Model/MarketCenterResponseBody.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getPublishers**
> \Swagger\Client\Model\PublishersResponseBody getPublishers($code, $page, $page_size)

List of Finazon publishers

Returns a list of all publishers available at Finazon.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\ReferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$code = "code_example"; // string | Filter by Finazon's publisher code
$page = 56; // int | Specific page of a paginated result to be displayed
$page_size = 1000; // int | Number of items displayed per page in a paginated result

try {
    $result = $apiInstance->getPublishers($code, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReferenceApi->getPublishers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **code** | **string**| Filter by Finazon&#x27;s publisher code | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 1000]

### Return type

[**\Swagger\Client\Model\PublishersResponseBody**](../Model/PublishersResponseBody.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSymbolsCrypto**
> \Swagger\Client\Model\SymbolsCryptoResponseBody getSymbolsCrypto($dataset, $ticker, $page, $page_size)

List of crypto pairs

Returns a list of cryptocurrency ticker symbols (pairs). This list is updated daily.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\ReferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$dataset = "dataset_example"; // string | Filter by Finazon's dataset code
$ticker = "ticker_example"; // string | Filter by ticker symbol
$page = 56; // int | Specific page of a paginated result to be displayed
$page_size = 1000; // int | Number of items displayed per page in a paginated result

try {
    $result = $apiInstance->getSymbolsCrypto($dataset, $ticker, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReferenceApi->getSymbolsCrypto: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **dataset** | **string**| Filter by Finazon&#x27;s dataset code | [optional]
 **ticker** | **string**| Filter by ticker symbol | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 1000]

### Return type

[**\Swagger\Client\Model\SymbolsCryptoResponseBody**](../Model/SymbolsCryptoResponseBody.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSymbolsForex**
> \Swagger\Client\Model\SymbolsForexResponseBody getSymbolsForex($ticker, $page, $page_size)

List of forex ticker symbols

Returns a list of forex ticker symbols (pairs). This list is updated daily.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\ReferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ticker = "ticker_example"; // string | Filter by ticker symbol
$page = 56; // int | Specific page of a paginated result to be displayed
$page_size = 1000; // int | Number of items displayed per page in a paginated result

try {
    $result = $apiInstance->getSymbolsForex($ticker, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReferenceApi->getSymbolsForex: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ticker** | **string**| Filter by ticker symbol | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 1000]

### Return type

[**\Swagger\Client\Model\SymbolsForexResponseBody**](../Model/SymbolsForexResponseBody.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSymbolsStocks**
> \Swagger\Client\Model\SymbolsStocksResponseBody getSymbolsStocks($cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $dataset, $ticker, $page, $page_size)

List of stock ticker symbols

Returns a list of stock ticker symbols. This list is updated daily.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\ReferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$cqs = "cqs_example"; // string | Filter by cqs symbol
$cik = "cik_example"; // string | Filter by cik code
$cusip = "cusip_example"; // string | Filter by cusip code
$isin = "isin_example"; // string | Filter by isin code
$composite_figi = "composite_figi_example"; // string | Filter by composite figi code
$share_figi = "share_figi_example"; // string | Filter by share class figi code
$lei = "lei_example"; // string | Filter by lei code
$dataset = "dataset_example"; // string | Filter by Finazon's dataset code
$ticker = "ticker_example"; // string | Filter by ticker symbol
$page = 56; // int | Specific page of a paginated result to be displayed
$page_size = 1000; // int | Number of items displayed per page in a paginated result

try {
    $result = $apiInstance->getSymbolsStocks($cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $dataset, $ticker, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReferenceApi->getSymbolsStocks: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **cqs** | **string**| Filter by cqs symbol | [optional]
 **cik** | **string**| Filter by cik code | [optional]
 **cusip** | **string**| Filter by cusip code | [optional]
 **isin** | **string**| Filter by isin code | [optional]
 **composite_figi** | **string**| Filter by composite figi code | [optional]
 **share_figi** | **string**| Filter by share class figi code | [optional]
 **lei** | **string**| Filter by lei code | [optional]
 **dataset** | **string**| Filter by Finazon&#x27;s dataset code | [optional]
 **ticker** | **string**| Filter by ticker symbol | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 1000]

### Return type

[**\Swagger\Client\Model\SymbolsStocksResponseBody**](../Model/SymbolsStocksResponseBody.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSymbolsUSStocks**
> \Swagger\Client\Model\SymbolsUSStocksResponseBody getSymbolsUSStocks($cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $page, $page_size, $ticker)

List of US stock ticker symbols

Returns a list of US stock ticker symbols. This list is updated daily.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\ReferenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$cqs = "cqs_example"; // string | Filter by cqs symbol
$cik = "cik_example"; // string | Filter by cik code
$cusip = "cusip_example"; // string | Filter by cusip code
$isin = "isin_example"; // string | Filter by isin code
$composite_figi = "composite_figi_example"; // string | Filter by composite figi code
$share_figi = "share_figi_example"; // string | Filter by share class figi code
$lei = "lei_example"; // string | Filter by lei code
$page = 56; // int | Specific page of a paginated result to be displayed
$page_size = 1000; // int | Number of items displayed per page in a paginated result
$ticker = "ticker_example"; // string | Filter by ticker symbol

try {
    $result = $apiInstance->getSymbolsUSStocks($cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $page, $page_size, $ticker);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReferenceApi->getSymbolsUSStocks: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **cqs** | **string**| Filter by cqs symbol | [optional]
 **cik** | **string**| Filter by cik code | [optional]
 **cusip** | **string**| Filter by cusip code | [optional]
 **isin** | **string**| Filter by isin code | [optional]
 **composite_figi** | **string**| Filter by composite figi code | [optional]
 **share_figi** | **string**| Filter by share class figi code | [optional]
 **lei** | **string**| Filter by lei code | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 1000]
 **ticker** | **string**| Filter by ticker symbol | [optional]

### Return type

[**\Swagger\Client\Model\SymbolsUSStocksResponseBody**](../Model/SymbolsUSStocksResponseBody.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

