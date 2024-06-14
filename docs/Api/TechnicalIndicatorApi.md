# Swagger\Client\TechnicalIndicatorApi

All URIs are relative to *https://api.finazon.io/v1.2/*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getTechnicalIndicatorAtr**](TechnicalIndicatorApi.md#gettechnicalindicatoratr) | **GET** /time_series/atr | ATR Technical indicators
[**getTechnicalIndicatorBBands**](TechnicalIndicatorApi.md#gettechnicalindicatorbbands) | **GET** /time_series/bbands | Overlap Studies
[**getTechnicalIndicatorIchimoku**](TechnicalIndicatorApi.md#gettechnicalindicatorichimoku) | **GET** /time_series/ichimoku | Overlap Studies
[**getTechnicalIndicatorMa**](TechnicalIndicatorApi.md#gettechnicalindicatorma) | **GET** /time_series/ma | Overlap Studies
[**getTechnicalIndicatorMacd**](TechnicalIndicatorApi.md#gettechnicalindicatormacd) | **GET** /time_series/macd | Momentum Indicators
[**getTechnicalIndicatorObv**](TechnicalIndicatorApi.md#gettechnicalindicatorobv) | **GET** /time_series/obv | Volume Indicators
[**getTechnicalIndicatorRsi**](TechnicalIndicatorApi.md#gettechnicalindicatorrsi) | **GET** /time_series/rsi | Momentum Indicators
[**getTechnicalIndicatorSar**](TechnicalIndicatorApi.md#gettechnicalindicatorsar) | **GET** /time_series/sar | Overlap Studies
[**getTechnicalIndicatorStoch**](TechnicalIndicatorApi.md#gettechnicalindicatorstoch) | **GET** /time_series/stoch | Momentum Indicators

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

$apiInstance = new Swagger\Client\Api\TechnicalIndicatorApi(
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
    echo 'Exception when calling TechnicalIndicatorApi->getTechnicalIndicatorAtr: ', $e->getMessage(), PHP_EOL;
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

$apiInstance = new Swagger\Client\Api\TechnicalIndicatorApi(
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
    echo 'Exception when calling TechnicalIndicatorApi->getTechnicalIndicatorBBands: ', $e->getMessage(), PHP_EOL;
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

$apiInstance = new Swagger\Client\Api\TechnicalIndicatorApi(
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
    echo 'Exception when calling TechnicalIndicatorApi->getTechnicalIndicatorIchimoku: ', $e->getMessage(), PHP_EOL;
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

$apiInstance = new Swagger\Client\Api\TechnicalIndicatorApi(
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
    echo 'Exception when calling TechnicalIndicatorApi->getTechnicalIndicatorMa: ', $e->getMessage(), PHP_EOL;
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

$apiInstance = new Swagger\Client\Api\TechnicalIndicatorApi(
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
    echo 'Exception when calling TechnicalIndicatorApi->getTechnicalIndicatorMacd: ', $e->getMessage(), PHP_EOL;
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

$apiInstance = new Swagger\Client\Api\TechnicalIndicatorApi(
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
    echo 'Exception when calling TechnicalIndicatorApi->getTechnicalIndicatorObv: ', $e->getMessage(), PHP_EOL;
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

$apiInstance = new Swagger\Client\Api\TechnicalIndicatorApi(
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
    echo 'Exception when calling TechnicalIndicatorApi->getTechnicalIndicatorRsi: ', $e->getMessage(), PHP_EOL;
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

$apiInstance = new Swagger\Client\Api\TechnicalIndicatorApi(
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
    echo 'Exception when calling TechnicalIndicatorApi->getTechnicalIndicatorSar: ', $e->getMessage(), PHP_EOL;
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

$apiInstance = new Swagger\Client\Api\TechnicalIndicatorApi(
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
    echo 'Exception when calling TechnicalIndicatorApi->getTechnicalIndicatorStoch: ', $e->getMessage(), PHP_EOL;
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

