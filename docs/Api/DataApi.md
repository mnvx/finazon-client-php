# Swagger\Client\DataApi

All URIs are relative to *https://api.finazon.io/v1.2/*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getBenzingaDividendsCalendar**](DataApi.md#getbenzingadividendscalendar) | **GET** /benzinga/dividends_calendar | Dividends calendar
[**getBenzingaEarningsCalendar**](DataApi.md#getbenzingaearningscalendar) | **GET** /benzinga/earnings_calendar | Earnings calendar
[**getBenzingaIPO**](DataApi.md#getbenzingaipo) | **GET** /benzinga/ipo | IPO data
[**getBenzingaNews**](DataApi.md#getbenzinganews) | **GET** /benzinga/news | News articles
[**getBinanceQuotes**](DataApi.md#getbinancequotes) | **GET** /binance/time_series | Time series
[**getCryptoQuotes**](DataApi.md#getcryptoquotes) | **GET** /crypto/time_series | Time series
[**getFilings**](DataApi.md#getfilings) | **GET** /sec/archive | Filings
[**getForexQuotes**](DataApi.md#getforexquotes) | **GET** /forex/time_series | Time series
[**getPriceBinance**](DataApi.md#getpricebinance) | **GET** /binance/price | Price
[**getPriceCommon**](DataApi.md#getpricecommon) | **GET** /price | Price
[**getPriceCrypto**](DataApi.md#getpricecrypto) | **GET** /crypto/price | Price
[**getPriceForex**](DataApi.md#getpriceforex) | **GET** /forex/price | Forex price
[**getPriceSip**](DataApi.md#getpricesip) | **GET** /sip_non_pro/price | Price
[**getPriceSip_0**](DataApi.md#getpricesip_0) | **GET** /sip_pro/price | Price
[**getPriceUsStocks**](DataApi.md#getpriceusstocks) | **GET** /us_stocks_essential/price | Price
[**getQuotes**](DataApi.md#getquotes) | **GET** /time_series | Time series
[**getSipTrades**](DataApi.md#getsiptrades) | **GET** /sip/trades | SIP trades
[**getTechnicalIndicatorAtr**](DataApi.md#gettechnicalindicatoratr) | **GET** /time_series/atr | ATR Technical indicators
[**getTechnicalIndicatorBBands**](DataApi.md#gettechnicalindicatorbbands) | **GET** /time_series/bbands | Overlap Studies
[**getTechnicalIndicatorIchimoku**](DataApi.md#gettechnicalindicatorichimoku) | **GET** /time_series/ichimoku | Overlap Studies
[**getTechnicalIndicatorMa**](DataApi.md#gettechnicalindicatorma) | **GET** /time_series/ma | Overlap Studies
[**getTechnicalIndicatorMacd**](DataApi.md#gettechnicalindicatormacd) | **GET** /time_series/macd | Momentum Indicators
[**getTechnicalIndicatorObv**](DataApi.md#gettechnicalindicatorobv) | **GET** /time_series/obv | Volume Indicators
[**getTechnicalIndicatorRsi**](DataApi.md#gettechnicalindicatorrsi) | **GET** /time_series/rsi | Momentum Indicators
[**getTechnicalIndicatorSar**](DataApi.md#gettechnicalindicatorsar) | **GET** /time_series/sar | Overlap Studies
[**getTechnicalIndicatorStoch**](DataApi.md#gettechnicalindicatorstoch) | **GET** /time_series/stoch | Momentum Indicators
[**getTickerSnapshot**](DataApi.md#gettickersnapshot) | **GET** /ticker/snapshot | Ticker snapshot
[**getTrades**](DataApi.md#gettrades) | **GET** /trades | Trades

# **getBenzingaDividendsCalendar**
> \Swagger\Client\Model\BenzingaDividendsCalendarResponseBody getBenzingaDividendsCalendar($ticker, $date, $start_at, $end_at, $page, $page_size, $order, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei)

Dividends calendar

Returns the dividends calendar from Benzinga.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ticker = "ticker_example"; // string | Filter by ticker symbol
$date = "date_example"; // string | Specifies the exact date to get the data for
$start_at = 789; // int | Filter events by start time using a UNIX timestamp
$end_at = 789; // int | Filter events by end time using a UNIX timestamp
$page = 0; // int | Specific page of a paginated result to be displayed
$page_size = 100; // int | Number of items displayed per page in a paginated result
$order = "desc"; // string | Sorting order of the output series
$cqs = "cqs_example"; // string | Filter by cqs symbol
$cik = "cik_example"; // string | Filter by cik code
$cusip = "cusip_example"; // string | Filter by cusip code
$isin = "isin_example"; // string | Filter by isin code
$composite_figi = "composite_figi_example"; // string | Filter by composite figi code
$share_figi = "share_figi_example"; // string | Filter by share class figi code
$lei = "lei_example"; // string | Filter by lei code

try {
    $result = $apiInstance->getBenzingaDividendsCalendar($ticker, $date, $start_at, $end_at, $page, $page_size, $order, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getBenzingaDividendsCalendar: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ticker** | **string**| Filter by ticker symbol |
 **date** | **string**| Specifies the exact date to get the data for | [optional]
 **start_at** | **int**| Filter events by start time using a UNIX timestamp | [optional]
 **end_at** | **int**| Filter events by end time using a UNIX timestamp | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional] [default to 0]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 100]
 **order** | **string**| Sorting order of the output series | [optional] [default to desc]
 **cqs** | **string**| Filter by cqs symbol | [optional]
 **cik** | **string**| Filter by cik code | [optional]
 **cusip** | **string**| Filter by cusip code | [optional]
 **isin** | **string**| Filter by isin code | [optional]
 **composite_figi** | **string**| Filter by composite figi code | [optional]
 **share_figi** | **string**| Filter by share class figi code | [optional]
 **lei** | **string**| Filter by lei code | [optional]

### Return type

[**\Swagger\Client\Model\BenzingaDividendsCalendarResponseBody**](../Model/BenzingaDividendsCalendarResponseBody.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getBenzingaEarningsCalendar**
> \Swagger\Client\Model\BenzingaEarningsCalendarResponseBody getBenzingaEarningsCalendar($ticker, $date, $start_at, $end_at, $page, $page_size, $order, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei)

Earnings calendar

Returns the earnings calendar from Benzinga.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ticker = "ticker_example"; // string | Filter by ticker symbol
$date = "date_example"; // string | Specifies the exact date to get the data for
$start_at = 789; // int | Filter events by start time using a UNIX timestamp
$end_at = 789; // int | Filter events by end time using a UNIX timestamp
$page = 0; // int | Specific page of a paginated result to be displayed
$page_size = 100; // int | Number of items displayed per page in a paginated result
$order = "desc"; // string | Sorting order of the output series
$cqs = "cqs_example"; // string | Filter by cqs symbol
$cik = "cik_example"; // string | Filter by cik code
$cusip = "cusip_example"; // string | Filter by cusip code
$isin = "isin_example"; // string | Filter by isin code
$composite_figi = "composite_figi_example"; // string | Filter by composite figi code
$share_figi = "share_figi_example"; // string | Filter by share class figi code
$lei = "lei_example"; // string | Filter by lei code

try {
    $result = $apiInstance->getBenzingaEarningsCalendar($ticker, $date, $start_at, $end_at, $page, $page_size, $order, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getBenzingaEarningsCalendar: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ticker** | **string**| Filter by ticker symbol |
 **date** | **string**| Specifies the exact date to get the data for | [optional]
 **start_at** | **int**| Filter events by start time using a UNIX timestamp | [optional]
 **end_at** | **int**| Filter events by end time using a UNIX timestamp | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional] [default to 0]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 100]
 **order** | **string**| Sorting order of the output series | [optional] [default to desc]
 **cqs** | **string**| Filter by cqs symbol | [optional]
 **cik** | **string**| Filter by cik code | [optional]
 **cusip** | **string**| Filter by cusip code | [optional]
 **isin** | **string**| Filter by isin code | [optional]
 **composite_figi** | **string**| Filter by composite figi code | [optional]
 **share_figi** | **string**| Filter by share class figi code | [optional]
 **lei** | **string**| Filter by lei code | [optional]

### Return type

[**\Swagger\Client\Model\BenzingaEarningsCalendarResponseBody**](../Model/BenzingaEarningsCalendarResponseBody.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getBenzingaIPO**
> \Swagger\Client\Model\BenzingaIPOResponseBody getBenzingaIPO($start_at, $end_at, $page, $page_size, $order, $exchange)

IPO data

Returns IPO data from Benzinga.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$start_at = 789; // int | Filter events by start time using a UNIX timestamp
$end_at = 789; // int | Filter events by end time using a UNIX timestamp
$page = 0; // int | Specific page of a paginated result to be displayed
$page_size = 100; // int | Number of items displayed per page in a paginated result
$order = "asc"; // string | Sorting order of the output series
$exchange = "exchange_example"; // string | Exchange where instrument is traded

try {
    $result = $apiInstance->getBenzingaIPO($start_at, $end_at, $page, $page_size, $order, $exchange);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getBenzingaIPO: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **start_at** | **int**| Filter events by start time using a UNIX timestamp | [optional]
 **end_at** | **int**| Filter events by end time using a UNIX timestamp | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional] [default to 0]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 100]
 **order** | **string**| Sorting order of the output series | [optional] [default to asc]
 **exchange** | **string**| Exchange where instrument is traded | [optional]

### Return type

[**\Swagger\Client\Model\BenzingaIPOResponseBody**](../Model/BenzingaIPOResponseBody.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getBenzingaNews**
> \Swagger\Client\Model\BenzingaNewsResponseBody getBenzingaNews($ticker, $date, $start_at, $end_at, $page, $page_size, $order, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei)

News articles

Returns the news articles from Benzinga.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ticker = "ticker_example"; // string | Filter by ticker symbol
$date = "date_example"; // string | Specifies the exact date to get the data for
$start_at = 789; // int | Filter events by start time using a UNIX timestamp
$end_at = 789; // int | Filter events by end time using a UNIX timestamp
$page = 0; // int | Specific page of a paginated result to be displayed
$page_size = 100; // int | Number of items displayed per page in a paginated result
$order = "desc"; // string | Sorting order of the output series
$cqs = "cqs_example"; // string | Filter by cqs symbol
$cik = "cik_example"; // string | Filter by cik code
$cusip = "cusip_example"; // string | Filter by cusip code
$isin = "isin_example"; // string | Filter by isin code
$composite_figi = "composite_figi_example"; // string | Filter by composite figi code
$share_figi = "share_figi_example"; // string | Filter by share class figi code
$lei = "lei_example"; // string | Filter by lei code

try {
    $result = $apiInstance->getBenzingaNews($ticker, $date, $start_at, $end_at, $page, $page_size, $order, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getBenzingaNews: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ticker** | **string**| Filter by ticker symbol |
 **date** | **string**| Specifies the exact date to get the data for | [optional]
 **start_at** | **int**| Filter events by start time using a UNIX timestamp | [optional]
 **end_at** | **int**| Filter events by end time using a UNIX timestamp | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional] [default to 0]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 100]
 **order** | **string**| Sorting order of the output series | [optional] [default to desc]
 **cqs** | **string**| Filter by cqs symbol | [optional]
 **cik** | **string**| Filter by cik code | [optional]
 **cusip** | **string**| Filter by cusip code | [optional]
 **isin** | **string**| Filter by isin code | [optional]
 **composite_figi** | **string**| Filter by composite figi code | [optional]
 **share_figi** | **string**| Filter by share class figi code | [optional]
 **lei** | **string**| Filter by lei code | [optional]

### Return type

[**\Swagger\Client\Model\BenzingaNewsResponseBody**](../Model/BenzingaNewsResponseBody.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getBinanceQuotes**
> \Swagger\Client\Model\QuoteBinanceItem[] getBinanceQuotes($ticker, $interval, $start_at, $end_at, $page, $page_size, $order)

Time series

This endpoint returns a time series of data points for any given ticker.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ticker = "ticker_example"; // string | Filter by ticker symbol
$interval = "interval_example"; // string | Interval between two consecutive points in time series
$start_at = 789; // int | Filter output by start time using a UNIX timestamp
$end_at = 789; // int | Filter output by end time using a UNIX timestamp
$page = 0; // int | Specific page of a paginated result to be displayed
$page_size = 30; // int | Number of items displayed per page in a paginated result
$order = "desc"; // string | Sorting order of the output series

try {
    $result = $apiInstance->getBinanceQuotes($ticker, $interval, $start_at, $end_at, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getBinanceQuotes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ticker** | **string**| Filter by ticker symbol |
 **interval** | **string**| Interval between two consecutive points in time series |
 **start_at** | **int**| Filter output by start time using a UNIX timestamp | [optional]
 **end_at** | **int**| Filter output by end time using a UNIX timestamp | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional] [default to 0]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 30]
 **order** | **string**| Sorting order of the output series | [optional] [default to desc]

### Return type

[**\Swagger\Client\Model\QuoteBinanceItem[]**](../Model/QuoteBinanceItem.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getCryptoQuotes**
> \Swagger\Client\Model\QuoteItem[] getCryptoQuotes($interval, $ticker, $start_at, $end_at, $page, $page_size, $order)

Time series

This endpoint returns a time series of data points for any given ticker.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$interval = "interval_example"; // string | Interval between two consecutive points in time series
$ticker = "ticker_example"; // string | Filter by ticker symbol
$start_at = 789; // int | Filter output by start time using a UNIX timestamp
$end_at = 789; // int | Filter output by end time using a UNIX timestamp
$page = 0; // int | Specific page of a paginated result to be displayed
$page_size = 30; // int | Number of items displayed per page in a paginated result
$order = "desc"; // string | Sorting order of the output series

try {
    $result = $apiInstance->getCryptoQuotes($interval, $ticker, $start_at, $end_at, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getCryptoQuotes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **interval** | **string**| Interval between two consecutive points in time series |
 **ticker** | **string**| Filter by ticker symbol |
 **start_at** | **int**| Filter output by start time using a UNIX timestamp | [optional]
 **end_at** | **int**| Filter output by end time using a UNIX timestamp | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional] [default to 0]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 30]
 **order** | **string**| Sorting order of the output series | [optional] [default to desc]

### Return type

[**\Swagger\Client\Model\QuoteItem[]**](../Model/QuoteItem.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getFilings**
> \Swagger\Client\Model\Filing[] getFilings($cik_code, $ticker, $form_type, $filled_from_ts, $filled_to_ts, $page, $page_size, $cqs, $cusip, $isin, $composite_figi, $share_figi, $lei)

Filings

Real-time and historical access to all forms, filings, and exhibits directly from the SEC's EDGAR system.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$cik_code = 789; // int | Filter by Central Index Key
$ticker = "ticker_example"; // string | Filter by ticker
$form_type = "form_type_example"; // string | Filter by form types
$filled_from_ts = 789; // int | Filter by filled time from
$filled_to_ts = 789; // int | Filter by filled time to
$page = 0; // int | Specific page of a paginated result to be displayed
$page_size = 10; // int | Number of items displayed per page in a paginated result
$cqs = "cqs_example"; // string | Filter by cqs symbol
$cusip = "cusip_example"; // string | Filter by cusip code
$isin = "isin_example"; // string | Filter by isin code
$composite_figi = "composite_figi_example"; // string | Filter by composite figi code
$share_figi = "share_figi_example"; // string | Filter by share class figi code
$lei = "lei_example"; // string | Filter by lei code

try {
    $result = $apiInstance->getFilings($cik_code, $ticker, $form_type, $filled_from_ts, $filled_to_ts, $page, $page_size, $cqs, $cusip, $isin, $composite_figi, $share_figi, $lei);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getFilings: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **cik_code** | **int**| Filter by Central Index Key | [optional]
 **ticker** | **string**| Filter by ticker | [optional]
 **form_type** | **string**| Filter by form types | [optional]
 **filled_from_ts** | **int**| Filter by filled time from | [optional]
 **filled_to_ts** | **int**| Filter by filled time to | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional] [default to 0]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 10]
 **cqs** | **string**| Filter by cqs symbol | [optional]
 **cusip** | **string**| Filter by cusip code | [optional]
 **isin** | **string**| Filter by isin code | [optional]
 **composite_figi** | **string**| Filter by composite figi code | [optional]
 **share_figi** | **string**| Filter by share class figi code | [optional]
 **lei** | **string**| Filter by lei code | [optional]

### Return type

[**\Swagger\Client\Model\Filing[]**](../Model/Filing.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getForexQuotes**
> \Swagger\Client\Model\QuoteForexItem[] getForexQuotes($interval, $ticker, $start_at, $end_at, $page, $page_size, $order)

Time series

This endpoint returns a time series of data points for any given ticker.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$interval = "interval_example"; // string | Interval between two consecutive points in time series
$ticker = "ticker_example"; // string | Filter by ticker symbol
$start_at = 789; // int | Filter output by start time using a UNIX timestamp
$end_at = 789; // int | Filter output by end time using a UNIX timestamp
$page = 0; // int | Specific page of a paginated result to be displayed
$page_size = 30; // int | Number of items displayed per page in a paginated result
$order = "desc"; // string | Sorting order of the output series

try {
    $result = $apiInstance->getForexQuotes($interval, $ticker, $start_at, $end_at, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getForexQuotes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **interval** | **string**| Interval between two consecutive points in time series |
 **ticker** | **string**| Filter by ticker symbol |
 **start_at** | **int**| Filter output by start time using a UNIX timestamp | [optional]
 **end_at** | **int**| Filter output by end time using a UNIX timestamp | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional] [default to 0]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 30]
 **order** | **string**| Sorting order of the output series | [optional] [default to desc]

### Return type

[**\Swagger\Client\Model\QuoteForexItem[]**](../Model/QuoteForexItem.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getPriceBinance**
> \Swagger\Client\Model\PriceResponseBody getPriceBinance($at, $ticker)

Price

Returns price value for given binance ticker.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$at = 789; // int | Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at <= at
$ticker = "ticker_example"; // string | Filter by ticker symbol

try {
    $result = $apiInstance->getPriceBinance($at, $ticker);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getPriceBinance: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **at** | **int**| Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at | [optional]
 **ticker** | **string**| Filter by ticker symbol | [optional]

### Return type

[**\Swagger\Client\Model\PriceResponseBody**](../Model/PriceResponseBody.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getPriceCommon**
> \Swagger\Client\Model\PriceResponseBody getPriceCommon($dataset, $at, $prepost, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $ticker)

Price

Returns price value for given ticker.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$dataset = "dataset_example"; // string | Filter by Finazon's dataset code
$at = 789; // int | Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at <= at
$prepost = false; // bool | Indicates whether data should be included for extended hours of trading
$cqs = "cqs_example"; // string | Filter by cqs symbol
$cik = "cik_example"; // string | Filter by cik code
$cusip = "cusip_example"; // string | Filter by cusip code
$isin = "isin_example"; // string | Filter by isin code
$composite_figi = "composite_figi_example"; // string | Filter by composite figi code
$share_figi = "share_figi_example"; // string | Filter by share class figi code
$lei = "lei_example"; // string | Filter by lei code
$ticker = "ticker_example"; // string | Filter by ticker symbol

try {
    $result = $apiInstance->getPriceCommon($dataset, $at, $prepost, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $ticker);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getPriceCommon: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **dataset** | **string**| Filter by Finazon&#x27;s dataset code |
 **at** | **int**| Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at | [optional]
 **prepost** | **bool**| Indicates whether data should be included for extended hours of trading | [optional] [default to false]
 **cqs** | **string**| Filter by cqs symbol | [optional]
 **cik** | **string**| Filter by cik code | [optional]
 **cusip** | **string**| Filter by cusip code | [optional]
 **isin** | **string**| Filter by isin code | [optional]
 **composite_figi** | **string**| Filter by composite figi code | [optional]
 **share_figi** | **string**| Filter by share class figi code | [optional]
 **lei** | **string**| Filter by lei code | [optional]
 **ticker** | **string**| Filter by ticker symbol | [optional]

### Return type

[**\Swagger\Client\Model\PriceResponseBody**](../Model/PriceResponseBody.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getPriceCrypto**
> \Swagger\Client\Model\PriceResponseBody getPriceCrypto($at, $ticker)

Price

Returns price value for given crypto ticker.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$at = 789; // int | Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at <= at
$ticker = "ticker_example"; // string | Filter by ticker symbol

try {
    $result = $apiInstance->getPriceCrypto($at, $ticker);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getPriceCrypto: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **at** | **int**| Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at | [optional]
 **ticker** | **string**| Filter by ticker symbol | [optional]

### Return type

[**\Swagger\Client\Model\PriceResponseBody**](../Model/PriceResponseBody.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getPriceForex**
> \Swagger\Client\Model\PriceResponseBody getPriceForex($at, $ticker)

Forex price

Returns price value for given forex ticker.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$at = 789; // int | Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at <= at
$ticker = "ticker_example"; // string | Filter by ticker symbol

try {
    $result = $apiInstance->getPriceForex($at, $ticker);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getPriceForex: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **at** | **int**| Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at | [optional]
 **ticker** | **string**| Filter by ticker symbol | [optional]

### Return type

[**\Swagger\Client\Model\PriceResponseBody**](../Model/PriceResponseBody.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getPriceSip**
> \Swagger\Client\Model\PriceResponseBody getPriceSip($at, $prepost, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $ticker)

Price

Returns price value for given ticker.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$at = 789; // int | Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at <= at
$prepost = false; // bool | Indicates whether data should be included for extended hours of trading
$cqs = "cqs_example"; // string | Filter by cqs symbol
$cik = "cik_example"; // string | Filter by cik code
$cusip = "cusip_example"; // string | Filter by cusip code
$isin = "isin_example"; // string | Filter by isin code
$composite_figi = "composite_figi_example"; // string | Filter by composite figi code
$share_figi = "share_figi_example"; // string | Filter by share class figi code
$lei = "lei_example"; // string | Filter by lei code
$ticker = "ticker_example"; // string | Filter by ticker symbol

try {
    $result = $apiInstance->getPriceSip($at, $prepost, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $ticker);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getPriceSip: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **at** | **int**| Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at | [optional]
 **prepost** | **bool**| Indicates whether data should be included for extended hours of trading | [optional] [default to false]
 **cqs** | **string**| Filter by cqs symbol | [optional]
 **cik** | **string**| Filter by cik code | [optional]
 **cusip** | **string**| Filter by cusip code | [optional]
 **isin** | **string**| Filter by isin code | [optional]
 **composite_figi** | **string**| Filter by composite figi code | [optional]
 **share_figi** | **string**| Filter by share class figi code | [optional]
 **lei** | **string**| Filter by lei code | [optional]
 **ticker** | **string**| Filter by ticker symbol | [optional]

### Return type

[**\Swagger\Client\Model\PriceResponseBody**](../Model/PriceResponseBody.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getPriceSip_0**
> \Swagger\Client\Model\PriceResponseBody getPriceSip_0($at, $prepost, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $ticker)

Price

Returns price value for given ticker.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$at = 789; // int | Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at <= at
$prepost = false; // bool | Indicates whether data should be included for extended hours of trading
$cqs = "cqs_example"; // string | Filter by cqs symbol
$cik = "cik_example"; // string | Filter by cik code
$cusip = "cusip_example"; // string | Filter by cusip code
$isin = "isin_example"; // string | Filter by isin code
$composite_figi = "composite_figi_example"; // string | Filter by composite figi code
$share_figi = "share_figi_example"; // string | Filter by share class figi code
$lei = "lei_example"; // string | Filter by lei code
$ticker = "ticker_example"; // string | Filter by ticker symbol

try {
    $result = $apiInstance->getPriceSip_0($at, $prepost, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $ticker);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getPriceSip_0: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **at** | **int**| Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at | [optional]
 **prepost** | **bool**| Indicates whether data should be included for extended hours of trading | [optional] [default to false]
 **cqs** | **string**| Filter by cqs symbol | [optional]
 **cik** | **string**| Filter by cik code | [optional]
 **cusip** | **string**| Filter by cusip code | [optional]
 **isin** | **string**| Filter by isin code | [optional]
 **composite_figi** | **string**| Filter by composite figi code | [optional]
 **share_figi** | **string**| Filter by share class figi code | [optional]
 **lei** | **string**| Filter by lei code | [optional]
 **ticker** | **string**| Filter by ticker symbol | [optional]

### Return type

[**\Swagger\Client\Model\PriceResponseBody**](../Model/PriceResponseBody.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getPriceUsStocks**
> \Swagger\Client\Model\PriceResponseBody getPriceUsStocks($at, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $ticker)

Price

Returns price value for given ticker.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$at = 789; // int | Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at <= at
$cqs = "cqs_example"; // string | Filter by cqs symbol
$cik = "cik_example"; // string | Filter by cik code
$cusip = "cusip_example"; // string | Filter by cusip code
$isin = "isin_example"; // string | Filter by isin code
$composite_figi = "composite_figi_example"; // string | Filter by composite figi code
$share_figi = "share_figi_example"; // string | Filter by share class figi code
$lei = "lei_example"; // string | Filter by lei code
$ticker = "ticker_example"; // string | Filter by ticker symbol

try {
    $result = $apiInstance->getPriceUsStocks($at, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $ticker);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getPriceUsStocks: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **at** | **int**| Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at | [optional]
 **cqs** | **string**| Filter by cqs symbol | [optional]
 **cik** | **string**| Filter by cik code | [optional]
 **cusip** | **string**| Filter by cusip code | [optional]
 **isin** | **string**| Filter by isin code | [optional]
 **composite_figi** | **string**| Filter by composite figi code | [optional]
 **share_figi** | **string**| Filter by share class figi code | [optional]
 **lei** | **string**| Filter by lei code | [optional]
 **ticker** | **string**| Filter by ticker symbol | [optional]

### Return type

[**\Swagger\Client\Model\PriceResponseBody**](../Model/PriceResponseBody.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getQuotes**
> \Swagger\Client\Model\QuoteItem[] getQuotes($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust)

Time series

This endpoint returns a time series of data points for any given ticker.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$dataset = "dataset_example"; // string | Filter by Finazon's dataset code
$ticker = "ticker_example"; // string | Filter by ticker symbol
$interval = "interval_example"; // string | Interval between two consecutive points in time series
$cqs = "cqs_example"; // string | Filter by cqs symbol
$cik = "cik_example"; // string | Filter by cik code
$cusip = "cusip_example"; // string | Filter by cusip code
$isin = "isin_example"; // string | Filter by isin code
$composite_figi = "composite_figi_example"; // string | Filter by composite figi code
$share_figi = "share_figi_example"; // string | Filter by share class figi code
$lei = "lei_example"; // string | Filter by lei code
$market = "market_example"; // string | Filter by market
$country = "country_example"; // string | Filter by ISO 3166 alpha-2 code
$start_at = 789; // int | Filter output by start time using a UNIX timestamp
$end_at = 789; // int | Filter output by end time using a UNIX timestamp
$page = 0; // int | Specific page of a paginated result to be displayed
$page_size = 30; // int | Number of items displayed per page in a paginated result
$order = "desc"; // string | Sorting order of the output series
$prepost = false; // bool | Indicates whether data should be included for extended hours of trading
$adjust = "all"; // string | Apply adjusting for data (all, splits, dividends, none)

try {
    $result = $apiInstance->getQuotes($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getQuotes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **dataset** | **string**| Filter by Finazon&#x27;s dataset code |
 **ticker** | **string**| Filter by ticker symbol |
 **interval** | **string**| Interval between two consecutive points in time series |
 **cqs** | **string**| Filter by cqs symbol | [optional]
 **cik** | **string**| Filter by cik code | [optional]
 **cusip** | **string**| Filter by cusip code | [optional]
 **isin** | **string**| Filter by isin code | [optional]
 **composite_figi** | **string**| Filter by composite figi code | [optional]
 **share_figi** | **string**| Filter by share class figi code | [optional]
 **lei** | **string**| Filter by lei code | [optional]
 **market** | **string**| Filter by market | [optional]
 **country** | **string**| Filter by ISO 3166 alpha-2 code | [optional]
 **start_at** | **int**| Filter output by start time using a UNIX timestamp | [optional]
 **end_at** | **int**| Filter output by end time using a UNIX timestamp | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional] [default to 0]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 30]
 **order** | **string**| Sorting order of the output series | [optional] [default to desc]
 **prepost** | **bool**| Indicates whether data should be included for extended hours of trading | [optional] [default to false]
 **adjust** | **string**| Apply adjusting for data (all, splits, dividends, none) | [optional] [default to all]

### Return type

[**\Swagger\Client\Model\QuoteItem[]**](../Model/QuoteItem.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSipTrades**
> \Swagger\Client\Model\SipTradesItem[] getSipTrades($ticker, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $start_at, $end_at, $tape, $page, $page_size, $order)

SIP trades

Returns detailed information on trades executed through the Securities Information Processor (SIP).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ticker = "ticker_example"; // string | Filter by ticker symbol
$cqs = "cqs_example"; // string | Filter by cqs symbol
$cik = "cik_example"; // string | Filter by cik code
$cusip = "cusip_example"; // string | Filter by cusip code
$isin = "isin_example"; // string | Filter by isin code
$composite_figi = "composite_figi_example"; // string | Filter by composite figi code
$share_figi = "share_figi_example"; // string | Filter by share class figi code
$lei = "lei_example"; // string | Filter by lei code
$market = "market_example"; // string | Filter by market center
$start_at = 789; // int | Filter trades by start time using a UNIX timestamp
$end_at = 789; // int | Filter trades by end time using a UNIX timestamp
$tape = "tape_example"; // string | Filter by tape
$page = 0; // int | Specific page of a paginated result to be displayed
$page_size = 10; // int | Number of items displayed per page in a paginated result
$order = "DESC"; // string | Sorting order of the output series

try {
    $result = $apiInstance->getSipTrades($ticker, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $start_at, $end_at, $tape, $page, $page_size, $order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getSipTrades: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ticker** | **string**| Filter by ticker symbol |
 **cqs** | **string**| Filter by cqs symbol | [optional]
 **cik** | **string**| Filter by cik code | [optional]
 **cusip** | **string**| Filter by cusip code | [optional]
 **isin** | **string**| Filter by isin code | [optional]
 **composite_figi** | **string**| Filter by composite figi code | [optional]
 **share_figi** | **string**| Filter by share class figi code | [optional]
 **lei** | **string**| Filter by lei code | [optional]
 **market** | **string**| Filter by market center | [optional]
 **start_at** | **int**| Filter trades by start time using a UNIX timestamp | [optional]
 **end_at** | **int**| Filter trades by end time using a UNIX timestamp | [optional]
 **tape** | **string**| Filter by tape | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional] [default to 0]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 10]
 **order** | **string**| Sorting order of the output series | [optional] [default to DESC]

### Return type

[**\Swagger\Client\Model\SipTradesItem[]**](../Model/SipTradesItem.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTechnicalIndicatorAtr**
> \Swagger\Client\Model\TechnicalIndicatorResponseAtr[] getTechnicalIndicatorAtr($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $time_period)

ATR Technical indicators

The Average True Range (ATR) is a volatility indicator that measures the average range of price movement over a specified period, helping traders assess market volatility.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$dataset = "dataset_example"; // string | Filter by Finazon's dataset code
$ticker = "ticker_example"; // string | Filter by ticker symbol
$interval = "interval_example"; // string | Interval between two consecutive points in time series
$cqs = "cqs_example"; // string | Filter by cqs symbol
$cik = "cik_example"; // string | Filter by cik code
$cusip = "cusip_example"; // string | Filter by cusip code
$isin = "isin_example"; // string | Filter by isin code
$composite_figi = "composite_figi_example"; // string | Filter by composite figi code
$share_figi = "share_figi_example"; // string | Filter by share class figi code
$lei = "lei_example"; // string | Filter by lei code
$market = "market_example"; // string | Filter by market
$country = "country_example"; // string | Filter by ISO 3166 alpha-2 code
$start_at = 789; // int | Filter output by start time using a UNIX timestamp
$end_at = 789; // int | Filter output by end time using a UNIX timestamp
$page = 0; // int | Specific page of a paginated result to be displayed
$page_size = 30; // int | Number of items displayed per page in a paginated result
$order = "desc"; // string | Sorting order of the output series
$prepost = false; // bool | Indicates whether data should be included for extended hours of trading
$adjust = "all"; // string | Apply adjusting for data (all, splits, dividends, none)
$time_period = 14; // int | Number of periods to average over.

try {
    $result = $apiInstance->getTechnicalIndicatorAtr($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $time_period);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getTechnicalIndicatorAtr: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **dataset** | **string**| Filter by Finazon&#x27;s dataset code |
 **ticker** | **string**| Filter by ticker symbol |
 **interval** | **string**| Interval between two consecutive points in time series |
 **cqs** | **string**| Filter by cqs symbol | [optional]
 **cik** | **string**| Filter by cik code | [optional]
 **cusip** | **string**| Filter by cusip code | [optional]
 **isin** | **string**| Filter by isin code | [optional]
 **composite_figi** | **string**| Filter by composite figi code | [optional]
 **share_figi** | **string**| Filter by share class figi code | [optional]
 **lei** | **string**| Filter by lei code | [optional]
 **market** | **string**| Filter by market | [optional]
 **country** | **string**| Filter by ISO 3166 alpha-2 code | [optional]
 **start_at** | **int**| Filter output by start time using a UNIX timestamp | [optional]
 **end_at** | **int**| Filter output by end time using a UNIX timestamp | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional] [default to 0]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 30]
 **order** | **string**| Sorting order of the output series | [optional] [default to desc]
 **prepost** | **bool**| Indicates whether data should be included for extended hours of trading | [optional] [default to false]
 **adjust** | **string**| Apply adjusting for data (all, splits, dividends, none) | [optional] [default to all]
 **time_period** | **int**| Number of periods to average over. | [optional] [default to 14]

### Return type

[**\Swagger\Client\Model\TechnicalIndicatorResponseAtr[]**](../Model/TechnicalIndicatorResponseAtr.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTechnicalIndicatorBBands**
> \Swagger\Client\Model\TechnicalIndicatorResponseBBands[] getTechnicalIndicatorBBands($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type, $time_period, $sd, $ma_type)

Overlap Studies

Bollinger Bands (BBANDS) are volatility bands placed above and below a moving average, measuring price volatility and helping traders identify potential overbought or oversold conditions.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$dataset = "dataset_example"; // string | Filter by Finazon's dataset code
$ticker = "ticker_example"; // string | Filter by ticker symbol
$interval = "interval_example"; // string | Interval between two consecutive points in time series
$cqs = "cqs_example"; // string | Filter by cqs symbol
$cik = "cik_example"; // string | Filter by cik code
$cusip = "cusip_example"; // string | Filter by cusip code
$isin = "isin_example"; // string | Filter by isin code
$composite_figi = "composite_figi_example"; // string | Filter by composite figi code
$share_figi = "share_figi_example"; // string | Filter by share class figi code
$lei = "lei_example"; // string | Filter by lei code
$market = "market_example"; // string | Filter by market
$country = "country_example"; // string | Filter by ISO 3166 alpha-2 code
$start_at = 789; // int | Filter output by start time using a UNIX timestamp
$end_at = 789; // int | Filter output by end time using a UNIX timestamp
$page = 0; // int | Specific page of a paginated result to be displayed
$page_size = 30; // int | Number of items displayed per page in a paginated result
$order = "desc"; // string | Sorting order of the output series
$prepost = false; // bool | Indicates whether data should be included for extended hours of trading
$adjust = "all"; // string | Apply adjusting for data (all, splits, dividends, none)
$series_type = "close"; // string | Specifies the price data type on which technical indicator is calculated
$time_period = 20; // int | Number of periods to average over.
$sd = 2.0; // double | Number of standard deviations
$ma_type = "SMA"; // string | The type of moving average used, such as SMA or EMA

try {
    $result = $apiInstance->getTechnicalIndicatorBBands($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type, $time_period, $sd, $ma_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getTechnicalIndicatorBBands: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **dataset** | **string**| Filter by Finazon&#x27;s dataset code |
 **ticker** | **string**| Filter by ticker symbol |
 **interval** | **string**| Interval between two consecutive points in time series |
 **cqs** | **string**| Filter by cqs symbol | [optional]
 **cik** | **string**| Filter by cik code | [optional]
 **cusip** | **string**| Filter by cusip code | [optional]
 **isin** | **string**| Filter by isin code | [optional]
 **composite_figi** | **string**| Filter by composite figi code | [optional]
 **share_figi** | **string**| Filter by share class figi code | [optional]
 **lei** | **string**| Filter by lei code | [optional]
 **market** | **string**| Filter by market | [optional]
 **country** | **string**| Filter by ISO 3166 alpha-2 code | [optional]
 **start_at** | **int**| Filter output by start time using a UNIX timestamp | [optional]
 **end_at** | **int**| Filter output by end time using a UNIX timestamp | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional] [default to 0]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 30]
 **order** | **string**| Sorting order of the output series | [optional] [default to desc]
 **prepost** | **bool**| Indicates whether data should be included for extended hours of trading | [optional] [default to false]
 **adjust** | **string**| Apply adjusting for data (all, splits, dividends, none) | [optional] [default to all]
 **series_type** | **string**| Specifies the price data type on which technical indicator is calculated | [optional] [default to close]
 **time_period** | **int**| Number of periods to average over. | [optional] [default to 20]
 **sd** | **double**| Number of standard deviations | [optional] [default to 2.0]
 **ma_type** | **string**| The type of moving average used, such as SMA or EMA | [optional] [default to SMA]

### Return type

[**\Swagger\Client\Model\TechnicalIndicatorResponseBBands[]**](../Model/TechnicalIndicatorResponseBBands.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTechnicalIndicatorIchimoku**
> \Swagger\Client\Model\TechnicalIndicatorResponseIchimoku[] getTechnicalIndicatorIchimoku($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $conversion_line_period, $base_line_period, $leading_span_b_period, $lagging_span_period, $include_ahead_span_period)

Overlap Studies

The Ichimoku Cloud (ICHIMOKU) is a comprehensive trend-following indicator that combines multiple moving averages and support/resistance levels to help traders identify potential entry and exit points, trend direction, and momentum.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$dataset = "dataset_example"; // string | Filter by Finazon's dataset code
$ticker = "ticker_example"; // string | Filter by ticker symbol
$interval = "interval_example"; // string | Interval between two consecutive points in time series
$cqs = "cqs_example"; // string | Filter by cqs symbol
$cik = "cik_example"; // string | Filter by cik code
$cusip = "cusip_example"; // string | Filter by cusip code
$isin = "isin_example"; // string | Filter by isin code
$composite_figi = "composite_figi_example"; // string | Filter by composite figi code
$share_figi = "share_figi_example"; // string | Filter by share class figi code
$lei = "lei_example"; // string | Filter by lei code
$market = "market_example"; // string | Filter by market
$country = "country_example"; // string | Filter by ISO 3166 alpha-2 code
$start_at = 789; // int | Filter output by start time using a UNIX timestamp
$end_at = 789; // int | Filter output by end time using a UNIX timestamp
$page = 0; // int | Specific page of a paginated result to be displayed
$page_size = 30; // int | Number of items displayed per page in a paginated result
$order = "desc"; // string | Sorting order of the output series
$prepost = false; // bool | Indicates whether data should be included for extended hours of trading
$adjust = "all"; // string | Apply adjusting for data (all, splits, dividends, none)
$conversion_line_period = 9; // int | The time period used for generating the conversation line
$base_line_period = 26; // int | The time period used for generating the base line
$leading_span_b_period = 52; // int | The time period used for generating the leading span B line
$lagging_span_period = 26; // int | The time period used for generating the lagging span line
$include_ahead_span_period = true; // bool | Indicates whether to include ahead span period

try {
    $result = $apiInstance->getTechnicalIndicatorIchimoku($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $conversion_line_period, $base_line_period, $leading_span_b_period, $lagging_span_period, $include_ahead_span_period);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getTechnicalIndicatorIchimoku: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **dataset** | **string**| Filter by Finazon&#x27;s dataset code |
 **ticker** | **string**| Filter by ticker symbol |
 **interval** | **string**| Interval between two consecutive points in time series |
 **cqs** | **string**| Filter by cqs symbol | [optional]
 **cik** | **string**| Filter by cik code | [optional]
 **cusip** | **string**| Filter by cusip code | [optional]
 **isin** | **string**| Filter by isin code | [optional]
 **composite_figi** | **string**| Filter by composite figi code | [optional]
 **share_figi** | **string**| Filter by share class figi code | [optional]
 **lei** | **string**| Filter by lei code | [optional]
 **market** | **string**| Filter by market | [optional]
 **country** | **string**| Filter by ISO 3166 alpha-2 code | [optional]
 **start_at** | **int**| Filter output by start time using a UNIX timestamp | [optional]
 **end_at** | **int**| Filter output by end time using a UNIX timestamp | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional] [default to 0]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 30]
 **order** | **string**| Sorting order of the output series | [optional] [default to desc]
 **prepost** | **bool**| Indicates whether data should be included for extended hours of trading | [optional] [default to false]
 **adjust** | **string**| Apply adjusting for data (all, splits, dividends, none) | [optional] [default to all]
 **conversion_line_period** | **int**| The time period used for generating the conversation line | [optional] [default to 9]
 **base_line_period** | **int**| The time period used for generating the base line | [optional] [default to 26]
 **leading_span_b_period** | **int**| The time period used for generating the leading span B line | [optional] [default to 52]
 **lagging_span_period** | **int**| The time period used for generating the lagging span line | [optional] [default to 26]
 **include_ahead_span_period** | **bool**| Indicates whether to include ahead span period | [optional] [default to true]

### Return type

[**\Swagger\Client\Model\TechnicalIndicatorResponseIchimoku[]**](../Model/TechnicalIndicatorResponseIchimoku.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTechnicalIndicatorMa**
> \Swagger\Client\Model\TechnicalIndicatorResponseMa[] getTechnicalIndicatorMa($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type, $time_period, $ma_type)

Overlap Studies

The Moving Average (MA) is a smoothing indicator that calculates the average price of a security over a specified period, helping traders identify trends and potential support or resistance levels.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$dataset = "dataset_example"; // string | Filter by Finazon's dataset code
$ticker = "ticker_example"; // string | Filter by ticker symbol
$interval = "interval_example"; // string | Interval between two consecutive points in time series
$cqs = "cqs_example"; // string | Filter by cqs symbol
$cik = "cik_example"; // string | Filter by cik code
$cusip = "cusip_example"; // string | Filter by cusip code
$isin = "isin_example"; // string | Filter by isin code
$composite_figi = "composite_figi_example"; // string | Filter by composite figi code
$share_figi = "share_figi_example"; // string | Filter by share class figi code
$lei = "lei_example"; // string | Filter by lei code
$market = "market_example"; // string | Filter by market
$country = "country_example"; // string | Filter by ISO 3166 alpha-2 code
$start_at = 789; // int | Filter output by start time using a UNIX timestamp
$end_at = 789; // int | Filter output by end time using a UNIX timestamp
$page = 0; // int | Specific page of a paginated result to be displayed
$page_size = 30; // int | Number of items displayed per page in a paginated result
$order = "desc"; // string | Sorting order of the output series
$prepost = false; // bool | Indicates whether data should be included for extended hours of trading
$adjust = "all"; // string | Apply adjusting for data (all, splits, dividends, none)
$series_type = "close"; // string | Specifies the price data type on which technical indicator is calculated
$time_period = 9; // int | Number of periods to average over.
$ma_type = "SMA"; // string | The type of moving average used, such as SMA or EMA

try {
    $result = $apiInstance->getTechnicalIndicatorMa($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type, $time_period, $ma_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getTechnicalIndicatorMa: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **dataset** | **string**| Filter by Finazon&#x27;s dataset code |
 **ticker** | **string**| Filter by ticker symbol |
 **interval** | **string**| Interval between two consecutive points in time series |
 **cqs** | **string**| Filter by cqs symbol | [optional]
 **cik** | **string**| Filter by cik code | [optional]
 **cusip** | **string**| Filter by cusip code | [optional]
 **isin** | **string**| Filter by isin code | [optional]
 **composite_figi** | **string**| Filter by composite figi code | [optional]
 **share_figi** | **string**| Filter by share class figi code | [optional]
 **lei** | **string**| Filter by lei code | [optional]
 **market** | **string**| Filter by market | [optional]
 **country** | **string**| Filter by ISO 3166 alpha-2 code | [optional]
 **start_at** | **int**| Filter output by start time using a UNIX timestamp | [optional]
 **end_at** | **int**| Filter output by end time using a UNIX timestamp | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional] [default to 0]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 30]
 **order** | **string**| Sorting order of the output series | [optional] [default to desc]
 **prepost** | **bool**| Indicates whether data should be included for extended hours of trading | [optional] [default to false]
 **adjust** | **string**| Apply adjusting for data (all, splits, dividends, none) | [optional] [default to all]
 **series_type** | **string**| Specifies the price data type on which technical indicator is calculated | [optional] [default to close]
 **time_period** | **int**| Number of periods to average over. | [optional] [default to 9]
 **ma_type** | **string**| The type of moving average used, such as SMA or EMA | [optional] [default to SMA]

### Return type

[**\Swagger\Client\Model\TechnicalIndicatorResponseMa[]**](../Model/TechnicalIndicatorResponseMa.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTechnicalIndicatorMacd**
> \Swagger\Client\Model\TechnicalIndicatorResponseMacd[] getTechnicalIndicatorMacd($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type, $fast_period, $slow_period, $signal_period)

Momentum Indicators

The Moving Average Convergence Divergence (MACD) is a momentum indicator that measures the difference between two moving averages, with a signal line used to identify potential trend reversals and trading opportunities.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$dataset = "dataset_example"; // string | Filter by Finazon's dataset code
$ticker = "ticker_example"; // string | Filter by ticker symbol
$interval = "interval_example"; // string | Interval between two consecutive points in time series
$cqs = "cqs_example"; // string | Filter by cqs symbol
$cik = "cik_example"; // string | Filter by cik code
$cusip = "cusip_example"; // string | Filter by cusip code
$isin = "isin_example"; // string | Filter by isin code
$composite_figi = "composite_figi_example"; // string | Filter by composite figi code
$share_figi = "share_figi_example"; // string | Filter by share class figi code
$lei = "lei_example"; // string | Filter by lei code
$market = "market_example"; // string | Filter by market
$country = "country_example"; // string | Filter by ISO 3166 alpha-2 code
$start_at = 789; // int | Filter output by start time using a UNIX timestamp
$end_at = 789; // int | Filter output by end time using a UNIX timestamp
$page = 0; // int | Specific page of a paginated result to be displayed
$page_size = 30; // int | Number of items displayed per page in a paginated result
$order = "desc"; // string | Sorting order of the output series
$prepost = false; // bool | Indicates whether data should be included for extended hours of trading
$adjust = "all"; // string | Apply adjusting for data (all, splits, dividends, none)
$series_type = "close"; // string | Specifies the price data type on which technical indicator is calculated
$fast_period = 12; // int | Number of periods for fast moving average
$slow_period = 26; // int | Number of periods for slow moving average
$signal_period = 9; // int | The time period used for generating the signal line

try {
    $result = $apiInstance->getTechnicalIndicatorMacd($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type, $fast_period, $slow_period, $signal_period);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getTechnicalIndicatorMacd: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **dataset** | **string**| Filter by Finazon&#x27;s dataset code |
 **ticker** | **string**| Filter by ticker symbol |
 **interval** | **string**| Interval between two consecutive points in time series |
 **cqs** | **string**| Filter by cqs symbol | [optional]
 **cik** | **string**| Filter by cik code | [optional]
 **cusip** | **string**| Filter by cusip code | [optional]
 **isin** | **string**| Filter by isin code | [optional]
 **composite_figi** | **string**| Filter by composite figi code | [optional]
 **share_figi** | **string**| Filter by share class figi code | [optional]
 **lei** | **string**| Filter by lei code | [optional]
 **market** | **string**| Filter by market | [optional]
 **country** | **string**| Filter by ISO 3166 alpha-2 code | [optional]
 **start_at** | **int**| Filter output by start time using a UNIX timestamp | [optional]
 **end_at** | **int**| Filter output by end time using a UNIX timestamp | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional] [default to 0]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 30]
 **order** | **string**| Sorting order of the output series | [optional] [default to desc]
 **prepost** | **bool**| Indicates whether data should be included for extended hours of trading | [optional] [default to false]
 **adjust** | **string**| Apply adjusting for data (all, splits, dividends, none) | [optional] [default to all]
 **series_type** | **string**| Specifies the price data type on which technical indicator is calculated | [optional] [default to close]
 **fast_period** | **int**| Number of periods for fast moving average | [optional] [default to 12]
 **slow_period** | **int**| Number of periods for slow moving average | [optional] [default to 26]
 **signal_period** | **int**| The time period used for generating the signal line | [optional] [default to 9]

### Return type

[**\Swagger\Client\Model\TechnicalIndicatorResponseMacd[]**](../Model/TechnicalIndicatorResponseMacd.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTechnicalIndicatorObv**
> \Swagger\Client\Model\TechnicalIndicatorResponseObv[] getTechnicalIndicatorObv($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type)

Volume Indicators

The On Balance Volume (OBV) indicator is a cumulative volume-based tool used to measure buying and selling pressure, helping traders identify potential price trends and reversals.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$dataset = "dataset_example"; // string | Filter by Finazon's dataset code
$ticker = "ticker_example"; // string | Filter by ticker symbol
$interval = "interval_example"; // string | Interval between two consecutive points in time series
$cqs = "cqs_example"; // string | Filter by cqs symbol
$cik = "cik_example"; // string | Filter by cik code
$cusip = "cusip_example"; // string | Filter by cusip code
$isin = "isin_example"; // string | Filter by isin code
$composite_figi = "composite_figi_example"; // string | Filter by composite figi code
$share_figi = "share_figi_example"; // string | Filter by share class figi code
$lei = "lei_example"; // string | Filter by lei code
$market = "market_example"; // string | Filter by market
$country = "country_example"; // string | Filter by ISO 3166 alpha-2 code
$start_at = 789; // int | Filter output by start time using a UNIX timestamp
$end_at = 789; // int | Filter output by end time using a UNIX timestamp
$page = 0; // int | Specific page of a paginated result to be displayed
$page_size = 30; // int | Number of items displayed per page in a paginated result
$order = "desc"; // string | Sorting order of the output series
$prepost = false; // bool | Indicates whether data should be included for extended hours of trading
$adjust = "all"; // string | Apply adjusting for data (all, splits, dividends, none)
$series_type = "close"; // string | Specifies the price data type on which technical indicator is calculated

try {
    $result = $apiInstance->getTechnicalIndicatorObv($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getTechnicalIndicatorObv: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **dataset** | **string**| Filter by Finazon&#x27;s dataset code |
 **ticker** | **string**| Filter by ticker symbol |
 **interval** | **string**| Interval between two consecutive points in time series |
 **cqs** | **string**| Filter by cqs symbol | [optional]
 **cik** | **string**| Filter by cik code | [optional]
 **cusip** | **string**| Filter by cusip code | [optional]
 **isin** | **string**| Filter by isin code | [optional]
 **composite_figi** | **string**| Filter by composite figi code | [optional]
 **share_figi** | **string**| Filter by share class figi code | [optional]
 **lei** | **string**| Filter by lei code | [optional]
 **market** | **string**| Filter by market | [optional]
 **country** | **string**| Filter by ISO 3166 alpha-2 code | [optional]
 **start_at** | **int**| Filter output by start time using a UNIX timestamp | [optional]
 **end_at** | **int**| Filter output by end time using a UNIX timestamp | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional] [default to 0]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 30]
 **order** | **string**| Sorting order of the output series | [optional] [default to desc]
 **prepost** | **bool**| Indicates whether data should be included for extended hours of trading | [optional] [default to false]
 **adjust** | **string**| Apply adjusting for data (all, splits, dividends, none) | [optional] [default to all]
 **series_type** | **string**| Specifies the price data type on which technical indicator is calculated | [optional] [default to close]

### Return type

[**\Swagger\Client\Model\TechnicalIndicatorResponseObv[]**](../Model/TechnicalIndicatorResponseObv.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTechnicalIndicatorRsi**
> \Swagger\Client\Model\TechnicalIndicatorResponseRsi[] getTechnicalIndicatorRsi($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type, $time_period)

Momentum Indicators

The Relative Strength Index (RSI) is a momentum oscillator that measures the speed and change of price movements, helping traders identify potential overbought or oversold conditions and trend reversals.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$dataset = "dataset_example"; // string | Filter by Finazon's dataset code
$ticker = "ticker_example"; // string | Filter by ticker symbol
$interval = "interval_example"; // string | Interval between two consecutive points in time series
$cqs = "cqs_example"; // string | Filter by cqs symbol
$cik = "cik_example"; // string | Filter by cik code
$cusip = "cusip_example"; // string | Filter by cusip code
$isin = "isin_example"; // string | Filter by isin code
$composite_figi = "composite_figi_example"; // string | Filter by composite figi code
$share_figi = "share_figi_example"; // string | Filter by share class figi code
$lei = "lei_example"; // string | Filter by lei code
$market = "market_example"; // string | Filter by market
$country = "country_example"; // string | Filter by ISO 3166 alpha-2 code
$start_at = 789; // int | Filter output by start time using a UNIX timestamp
$end_at = 789; // int | Filter output by end time using a UNIX timestamp
$page = 0; // int | Specific page of a paginated result to be displayed
$page_size = 30; // int | Number of items displayed per page in a paginated result
$order = "desc"; // string | Sorting order of the output series
$prepost = false; // bool | Indicates whether data should be included for extended hours of trading
$adjust = "all"; // string | Apply adjusting for data (all, splits, dividends, none)
$series_type = "close"; // string | Specifies the price data type on which technical indicator is calculated
$time_period = 14; // int | Number of periods to average over

try {
    $result = $apiInstance->getTechnicalIndicatorRsi($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type, $time_period);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getTechnicalIndicatorRsi: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **dataset** | **string**| Filter by Finazon&#x27;s dataset code |
 **ticker** | **string**| Filter by ticker symbol |
 **interval** | **string**| Interval between two consecutive points in time series |
 **cqs** | **string**| Filter by cqs symbol | [optional]
 **cik** | **string**| Filter by cik code | [optional]
 **cusip** | **string**| Filter by cusip code | [optional]
 **isin** | **string**| Filter by isin code | [optional]
 **composite_figi** | **string**| Filter by composite figi code | [optional]
 **share_figi** | **string**| Filter by share class figi code | [optional]
 **lei** | **string**| Filter by lei code | [optional]
 **market** | **string**| Filter by market | [optional]
 **country** | **string**| Filter by ISO 3166 alpha-2 code | [optional]
 **start_at** | **int**| Filter output by start time using a UNIX timestamp | [optional]
 **end_at** | **int**| Filter output by end time using a UNIX timestamp | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional] [default to 0]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 30]
 **order** | **string**| Sorting order of the output series | [optional] [default to desc]
 **prepost** | **bool**| Indicates whether data should be included for extended hours of trading | [optional] [default to false]
 **adjust** | **string**| Apply adjusting for data (all, splits, dividends, none) | [optional] [default to all]
 **series_type** | **string**| Specifies the price data type on which technical indicator is calculated | [optional] [default to close]
 **time_period** | **int**| Number of periods to average over | [optional] [default to 14]

### Return type

[**\Swagger\Client\Model\TechnicalIndicatorResponseRsi[]**](../Model/TechnicalIndicatorResponseRsi.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTechnicalIndicatorSar**
> \Swagger\Client\Model\TechnicalIndicatorResponseSar[] getTechnicalIndicatorSar($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $acceleration, $maximum)

Overlap Studies

The Parabolic SAR (SAR) is a trend-following indicator that calculates potential support and resistance levels based on a security's price and time, helping traders identify potential entry and exit points.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$dataset = "dataset_example"; // string | Filter by Finazon's dataset code
$ticker = "ticker_example"; // string | Filter by ticker symbol
$interval = "interval_example"; // string | Interval between two consecutive points in time series
$cqs = "cqs_example"; // string | Filter by cqs symbol
$cik = "cik_example"; // string | Filter by cik code
$cusip = "cusip_example"; // string | Filter by cusip code
$isin = "isin_example"; // string | Filter by isin code
$composite_figi = "composite_figi_example"; // string | Filter by composite figi code
$share_figi = "share_figi_example"; // string | Filter by share class figi code
$lei = "lei_example"; // string | Filter by lei code
$market = "market_example"; // string | Filter by market
$country = "country_example"; // string | Filter by ISO 3166 alpha-2 code
$start_at = 789; // int | Filter output by start time using a UNIX timestamp
$end_at = 789; // int | Filter output by end time using a UNIX timestamp
$page = 0; // int | Specific page of a paginated result to be displayed
$page_size = 30; // int | Number of items displayed per page in a paginated result
$order = "desc"; // string | Sorting order of the output series
$prepost = false; // bool | Indicates whether data should be included for extended hours of trading
$adjust = "all"; // string | Apply adjusting for data (all, splits, dividends, none)
$acceleration = 0.02; // double | Initial acceleration factor
$maximum = 0.2; // double | Maximum value for the acceleration factor

try {
    $result = $apiInstance->getTechnicalIndicatorSar($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $acceleration, $maximum);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getTechnicalIndicatorSar: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **dataset** | **string**| Filter by Finazon&#x27;s dataset code |
 **ticker** | **string**| Filter by ticker symbol |
 **interval** | **string**| Interval between two consecutive points in time series |
 **cqs** | **string**| Filter by cqs symbol | [optional]
 **cik** | **string**| Filter by cik code | [optional]
 **cusip** | **string**| Filter by cusip code | [optional]
 **isin** | **string**| Filter by isin code | [optional]
 **composite_figi** | **string**| Filter by composite figi code | [optional]
 **share_figi** | **string**| Filter by share class figi code | [optional]
 **lei** | **string**| Filter by lei code | [optional]
 **market** | **string**| Filter by market | [optional]
 **country** | **string**| Filter by ISO 3166 alpha-2 code | [optional]
 **start_at** | **int**| Filter output by start time using a UNIX timestamp | [optional]
 **end_at** | **int**| Filter output by end time using a UNIX timestamp | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional] [default to 0]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 30]
 **order** | **string**| Sorting order of the output series | [optional] [default to desc]
 **prepost** | **bool**| Indicates whether data should be included for extended hours of trading | [optional] [default to false]
 **adjust** | **string**| Apply adjusting for data (all, splits, dividends, none) | [optional] [default to all]
 **acceleration** | **double**| Initial acceleration factor | [optional] [default to 0.02]
 **maximum** | **double**| Maximum value for the acceleration factor | [optional] [default to 0.2]

### Return type

[**\Swagger\Client\Model\TechnicalIndicatorResponseSar[]**](../Model/TechnicalIndicatorResponseSar.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTechnicalIndicatorStoch**
> \Swagger\Client\Model\TechnicalIndicatorResponseStoch[] getTechnicalIndicatorStoch($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $fast_k_period, $slow_k_period, $slow_d_period, $slow_kma_type, $slow_dma_type)

Momentum Indicators

The Stochastic Oscillator (STOCH) is a momentum indicator that compares a security's closing price to its price range over a specified period, helping traders identify potential overbought or oversold conditions and trend reversals.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$dataset = "dataset_example"; // string | Filter by Finazon's dataset code
$ticker = "ticker_example"; // string | Filter by ticker symbol
$interval = "interval_example"; // string | Interval between two consecutive points in time series
$cqs = "cqs_example"; // string | Filter by cqs symbol
$cik = "cik_example"; // string | Filter by cik code
$cusip = "cusip_example"; // string | Filter by cusip code
$isin = "isin_example"; // string | Filter by isin code
$composite_figi = "composite_figi_example"; // string | Filter by composite figi code
$share_figi = "share_figi_example"; // string | Filter by share class figi code
$lei = "lei_example"; // string | Filter by lei code
$market = "market_example"; // string | Filter by market
$country = "country_example"; // string | Filter by ISO 3166 alpha-2 code
$start_at = 789; // int | Filter output by start time using a UNIX timestamp
$end_at = 789; // int | Filter output by end time using a UNIX timestamp
$page = 0; // int | Specific page of a paginated result to be displayed
$page_size = 30; // int | Number of items displayed per page in a paginated result
$order = "desc"; // string | Sorting order of the output series
$prepost = false; // bool | Indicates whether data should be included for extended hours of trading
$adjust = "all"; // string | Apply adjusting for data (all, splits, dividends, none)
$fast_k_period = 14; // int | The time period for the fast %K line in the Stochastic Oscillator
$slow_k_period = 1; // int | The time period for the slow %K line in the Stochastic Oscillator
$slow_d_period = 3; // int | The time period for the slow %D line in the Stochastic Oscillator
$slow_kma_type = "SMA"; // string | The type of slow %K Moving Average used
$slow_dma_type = "SMA"; // string | The type of slow Displaced Moving Average used

try {
    $result = $apiInstance->getTechnicalIndicatorStoch($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $fast_k_period, $slow_k_period, $slow_d_period, $slow_kma_type, $slow_dma_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getTechnicalIndicatorStoch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **dataset** | **string**| Filter by Finazon&#x27;s dataset code |
 **ticker** | **string**| Filter by ticker symbol |
 **interval** | **string**| Interval between two consecutive points in time series |
 **cqs** | **string**| Filter by cqs symbol | [optional]
 **cik** | **string**| Filter by cik code | [optional]
 **cusip** | **string**| Filter by cusip code | [optional]
 **isin** | **string**| Filter by isin code | [optional]
 **composite_figi** | **string**| Filter by composite figi code | [optional]
 **share_figi** | **string**| Filter by share class figi code | [optional]
 **lei** | **string**| Filter by lei code | [optional]
 **market** | **string**| Filter by market | [optional]
 **country** | **string**| Filter by ISO 3166 alpha-2 code | [optional]
 **start_at** | **int**| Filter output by start time using a UNIX timestamp | [optional]
 **end_at** | **int**| Filter output by end time using a UNIX timestamp | [optional]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional] [default to 0]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 30]
 **order** | **string**| Sorting order of the output series | [optional] [default to desc]
 **prepost** | **bool**| Indicates whether data should be included for extended hours of trading | [optional] [default to false]
 **adjust** | **string**| Apply adjusting for data (all, splits, dividends, none) | [optional] [default to all]
 **fast_k_period** | **int**| The time period for the fast %K line in the Stochastic Oscillator | [optional] [default to 14]
 **slow_k_period** | **int**| The time period for the slow %K line in the Stochastic Oscillator | [optional] [default to 1]
 **slow_d_period** | **int**| The time period for the slow %D line in the Stochastic Oscillator | [optional] [default to 3]
 **slow_kma_type** | **string**| The type of slow %K Moving Average used | [optional] [default to SMA]
 **slow_dma_type** | **string**| The type of slow Displaced Moving Average used | [optional] [default to SMA]

### Return type

[**\Swagger\Client\Model\TechnicalIndicatorResponseStoch[]**](../Model/TechnicalIndicatorResponseStoch.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTickerSnapshot**
> \Swagger\Client\Model\InlineResponse200 getTickerSnapshot($dataset, $ticker, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country)

Ticker snapshot

This endpoint returns a combination of different data points, such as daily performance, last quote, last trade, minute data, and previous day performance.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$dataset = "dataset_example"; // string | Filter by Finazon's dataset code
$ticker = "ticker_example"; // string | Filter by ticker symbol
$cqs = "cqs_example"; // string | Filter by cqs symbol
$cik = "cik_example"; // string | Filter by cik code
$cusip = "cusip_example"; // string | Filter by cusip code
$isin = "isin_example"; // string | Filter by isin code
$composite_figi = "composite_figi_example"; // string | Filter by composite figi code
$share_figi = "share_figi_example"; // string | Filter by share class figi code
$lei = "lei_example"; // string | Filter by lei code
$market = "market_example"; // string | Filter by market
$country = "country_example"; // string | Filter by ISO 3166 alpha-2 code

try {
    $result = $apiInstance->getTickerSnapshot($dataset, $ticker, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getTickerSnapshot: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **dataset** | **string**| Filter by Finazon&#x27;s dataset code |
 **ticker** | **string**| Filter by ticker symbol |
 **cqs** | **string**| Filter by cqs symbol | [optional]
 **cik** | **string**| Filter by cik code | [optional]
 **cusip** | **string**| Filter by cusip code | [optional]
 **isin** | **string**| Filter by isin code | [optional]
 **composite_figi** | **string**| Filter by composite figi code | [optional]
 **share_figi** | **string**| Filter by share class figi code | [optional]
 **lei** | **string**| Filter by lei code | [optional]
 **market** | **string**| Filter by market | [optional]
 **country** | **string**| Filter by ISO 3166 alpha-2 code | [optional]

### Return type

[**\Swagger\Client\Model\InlineResponse200**](../Model/InlineResponse200.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTrades**
> \Swagger\Client\Model\TradesItem[] getTrades($dataset, $ticker, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $country, $start_at, $end_at, $order, $page, $page_size)

Trades

Returns general information on executed trades.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('apikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('apikey', 'Bearer');

$apiInstance = new Swagger\Client\Api\DataApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$dataset = "dataset_example"; // string | Filter by Finazon's dataset code
$ticker = "ticker_example"; // string | Filter by ticker symbol
$cqs = "cqs_example"; // string | Filter by cqs symbol
$cik = "cik_example"; // string | Filter by cik code
$cusip = "cusip_example"; // string | Filter by cusip code
$isin = "isin_example"; // string | Filter by isin code
$composite_figi = "composite_figi_example"; // string | Filter by composite figi code
$share_figi = "share_figi_example"; // string | Filter by share class figi code
$lei = "lei_example"; // string | Filter by lei code
$country = "country_example"; // string | Filter by ISO 3166 alpha-2 code
$start_at = 789; // int | Filter trades by start time using a UNIX timestamp
$end_at = 789; // int | Filter trades by end time using a UNIX timestamp
$order = "desc"; // string | Sorting order of the output series
$page = 0; // int | Specific page of a paginated result to be displayed
$page_size = 1000; // int | Number of items displayed per page in a paginated result

try {
    $result = $apiInstance->getTrades($dataset, $ticker, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $country, $start_at, $end_at, $order, $page, $page_size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DataApi->getTrades: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **dataset** | **string**| Filter by Finazon&#x27;s dataset code |
 **ticker** | **string**| Filter by ticker symbol |
 **cqs** | **string**| Filter by cqs symbol | [optional]
 **cik** | **string**| Filter by cik code | [optional]
 **cusip** | **string**| Filter by cusip code | [optional]
 **isin** | **string**| Filter by isin code | [optional]
 **composite_figi** | **string**| Filter by composite figi code | [optional]
 **share_figi** | **string**| Filter by share class figi code | [optional]
 **lei** | **string**| Filter by lei code | [optional]
 **country** | **string**| Filter by ISO 3166 alpha-2 code | [optional]
 **start_at** | **int**| Filter trades by start time using a UNIX timestamp | [optional]
 **end_at** | **int**| Filter trades by end time using a UNIX timestamp | [optional]
 **order** | **string**| Sorting order of the output series | [optional] [default to desc]
 **page** | **int**| Specific page of a paginated result to be displayed | [optional] [default to 0]
 **page_size** | **int**| Number of items displayed per page in a paginated result | [optional] [default to 1000]

### Return type

[**\Swagger\Client\Model\TradesItem[]**](../Model/TradesItem.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

