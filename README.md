# SwaggerClient-php
## API reference  Finazon is a comprehensive financial data marketplace that enables developers to effortlessly integrate a wide variety of global datasets, including stocks, ETFs, cryptocurrencies, and more, all with fully customizable parameters.  The Finazon API is built around [REST](https://en.wikipedia.org/wiki/Representational_state_transfer) principles, featuring resource-oriented URLs with predictable behavior. The API accepts [form-encoded](https://en.wikipedia.org/wiki/POST_(HTTP)#Use_for_submitting_web_forms) request bodies, returns JSON-encoded responses, and utilizes standard HTTP response codes, authentication methods, and verbs.  The Finazon API doesn't support bulk updates. You can work on only one instrument per request.  ## Authentification  To authenticate requests, the Finazon API requires [API keys](https://finazon.io/account/developers/api-keys). You can obtain, view, and manage your API keys through the [Finazon Dashboard](https://finazon.io/account/home).  Your API keys hold significant privileges, so ensure their security by not sharing your secret API keys in publicly accessible areas, such as GitHub repositories, client-side code, or any other public platforms.  All API requests must be made over [HTTPS](http://en.wikipedia.org/wiki/HTTP_Secure). Calls over plain HTTP will fail, as will API requests without authentication.  Once you have your API key, include it in the parameters as follows:  ```bash https://api.finazon.io/latest?apikey=YOUR_API_KEY ```  Alternatively, pass it as a request header:  ```bash Authorization: apikey YOUR_API_KEY ```  ## Versioning  Whenever [backwards-incompatible](https://support.finazon.io/en/articles/7792859-api-upgrades#h_1e014217bf) changes are introduced to the API, a new dated version is released. Consult our [API upgrades guide](https://support.finazon.io/en/articles/7792859-api-upgrades) for more information on backwards compatibility, and view our API changelog for all API updates.  To always use the most up-to-date version, specify it as `/latest`:  ```bash https://api.finazon.io/latest ```  To access the most recent version of `v1.*`, use the following:  ```bash https://api.finazon.io/v1  ```  Or, to retrieve a specific version, call:  ```bash  https://api.finazon.io/v1.0 ```  Finazon will provide advance notice before deprecating older API versions, giving developers ample time to migrate to the updated version.  ## Endpoints structure  The Finazon API adheres to a consistent and structured pattern for its endpoints. The base URL for all requests is:  ```bash https://api.finazon.io/ ```  API endpoints are organized by resource types, including universal resources accessible across all publishers and publisher-specific resources. For example, the `/time_series` endpoint is compatible with all publishers that support this data format. Such responses will be standardized across all datasets, facilitating rapid integration of new markets into your applications.  ```bash https://api.finazon.io/latest/{{resource}} https://api.finazon.io/latest/time_series ```  Additionally, datasets may contain unique data exclusive to that dataset. In such cases, you might want to call a separate endpoint specifying the publisher to gather more data. For instance, the [Binance](https://finazon.io/dataset/binance) dataset time series can be requested as:  ```bash  https://api.finazon.io/latest/{{publisher}}/{{resource}} https://api.finazon.io/latest/binance/time_series ```  ## Parameters  Each API request has its own set of required and optional parameters. Parameters should be separated by an ampersand. Parameter names are case-sensitive, while parameter values are not. Each API request has its own set of required and optional parameters. Parameters should be separated by an ampersand. Parameter names and parameter values are case-sensitive  ```bash https://api.finazon.io/latest/time_series?dataset=sip_non_pro&ticker=AAPL&interval=1m&apikey= ```  ### Pagination  All API resources supporting bulk fetches are retrieved via \"list\" API methods. For example, you can list time series, list trades, and list quotes. These list API methods share a common structure, accepting at least these five parameters: `page`, `page_size`, `order`, `start_at`, and `end_at`.  The response of a list API method represents a single page in a reverse chronological stream of objects. If you do not specify `start_at` or `end_at`, you will receive the first page of this list, containing the newest objects. By default, you will receive 10 objects if you do not specify an alternative value for `page_size`. You can specify `start_at` equal to the T (timestamp) value of an item to retrieve the page of older objects occurring immediately after the specified timestamp in the reverse chronological stream. Similarly, you can specify `end_at` to receive a page of newer objects occurring immediately before the named object in the stream. You can use one of `start_at` or `end_at` or both. Objects in a page always appear in reverse chronological order, unless `order` is specified.  ## Errors  Finazon employs standard HTTP response codes to signify the success or failure of an API request. Generally, the response codes can be interpreted as follows:  `2xx` range codes indicate a successful request.  `4xx` range codes signify an error resulting from the provided information (e.g., invalid API key, API rate limit exceeded, etc.).  `5xx` range codes represent errors originating from Finazon's servers (these are rare occurrences).  For all `4xx`errors that can be addressed programmatically (e.g., endpoint not found), an error message is included to succinctly explain the reported issue. This allows developers to quickly identify and resolve errors in their API requests.   status | code | message | --------|:-----|:--------|  400 |  INVALID_PARAMETER | The **{parameter_name}** parameter is missing or invalid. |  400 |  INVALID_DATE_RANGE | The requested date range is invalid or unsupported. |  400 |  UNSUPPORTED_MARKET | The requested market or exchange is not supported by the API. Please check the supported markets and try again. |  400 |  INVALID_TICKER | The provided ticker is invalid or unsupported. |  401 |  UNAUTHORIZED_ACCESS | You are not authorized to access the requested endpoint or you have insufficient permissions. |  404 |  ENDPOINT_NOT_FOUND | The requested endpoint **{endpoint_name}** does not exist or could not be found. |  429 |  API_RATE_LIMIT_EXCEEDED | You have exceeded the allowed number of API calls within the minute. Please wait and try again later. |  401 |  INVALID_API_KEY | The provided API key is invalid or has expired. Please check your API key and try again |  408 |  REQUEST_TIMEOUT | The request took too long to complete and timed out. Please try again later or reduce the complexity of your query. |  503 |  DATA_UNAVAILABLE | The requested data is temporarily unavailable or not supported. Please try again later or check the availability of the data. |  500 |  INTERNAL_SERVER_ERROR | An error occurred on the server-side while processing the request. Please try again later. If the issue persists, contact support. |

This PHP package is automatically generated by the [Swagger Codegen](https://github.com/swagger-api/swagger-codegen) project:

- API version: v1.2
- Build package: io.swagger.codegen.v3.generators.php.PhpClientCodegen

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
      "url": "https://github.com/git_user_id/git_repo_id.git"
    }
  ],
  "require": {
    "git_user_id/git_repo_id": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/SwaggerClient-php/vendor/autoload.php');
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

## Documentation for API Endpoints

All URIs are relative to *https://api.finazon.io/v1.2/*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*DataApi* | [**getBenzingaDividendsCalendar**](docs/Api/DataApi.md#getbenzingadividendscalendar) | **GET** /benzinga/dividends_calendar | Dividends calendar
*DataApi* | [**getBenzingaEarningsCalendar**](docs/Api/DataApi.md#getbenzingaearningscalendar) | **GET** /benzinga/earnings_calendar | Earnings calendar
*DataApi* | [**getBenzingaIPO**](docs/Api/DataApi.md#getbenzingaipo) | **GET** /benzinga/ipo | IPO data
*DataApi* | [**getBenzingaNews**](docs/Api/DataApi.md#getbenzinganews) | **GET** /benzinga/news | News articles
*DataApi* | [**getBinanceQuotes**](docs/Api/DataApi.md#getbinancequotes) | **GET** /binance/time_series | Time series
*DataApi* | [**getCryptoQuotes**](docs/Api/DataApi.md#getcryptoquotes) | **GET** /crypto/time_series | Time series
*DataApi* | [**getFilings**](docs/Api/DataApi.md#getfilings) | **GET** /sec/archive | Filings
*DataApi* | [**getForexQuotes**](docs/Api/DataApi.md#getforexquotes) | **GET** /forex/time_series | Time series
*DataApi* | [**getPriceBinance**](docs/Api/DataApi.md#getpricebinance) | **GET** /binance/price | Price
*DataApi* | [**getPriceCommon**](docs/Api/DataApi.md#getpricecommon) | **GET** /price | Price
*DataApi* | [**getPriceCrypto**](docs/Api/DataApi.md#getpricecrypto) | **GET** /crypto/price | Price
*DataApi* | [**getPriceForex**](docs/Api/DataApi.md#getpriceforex) | **GET** /forex/price | Forex price
*DataApi* | [**getPriceSip**](docs/Api/DataApi.md#getpricesip) | **GET** /sip_non_pro/price | Price
*DataApi* | [**getPriceSip_0**](docs/Api/DataApi.md#getpricesip_0) | **GET** /sip_pro/price | Price
*DataApi* | [**getPriceUsStocks**](docs/Api/DataApi.md#getpriceusstocks) | **GET** /us_stocks_essential/price | Price
*DataApi* | [**getQuotes**](docs/Api/DataApi.md#getquotes) | **GET** /time_series | Time series
*DataApi* | [**getSipTrades**](docs/Api/DataApi.md#getsiptrades) | **GET** /sip/trades | SIP trades
*DataApi* | [**getTechnicalIndicatorAtr**](docs/Api/DataApi.md#gettechnicalindicatoratr) | **GET** /time_series/atr | ATR Technical indicators
*DataApi* | [**getTechnicalIndicatorBBands**](docs/Api/DataApi.md#gettechnicalindicatorbbands) | **GET** /time_series/bbands | Overlap Studies
*DataApi* | [**getTechnicalIndicatorIchimoku**](docs/Api/DataApi.md#gettechnicalindicatorichimoku) | **GET** /time_series/ichimoku | Overlap Studies
*DataApi* | [**getTechnicalIndicatorMa**](docs/Api/DataApi.md#gettechnicalindicatorma) | **GET** /time_series/ma | Overlap Studies
*DataApi* | [**getTechnicalIndicatorMacd**](docs/Api/DataApi.md#gettechnicalindicatormacd) | **GET** /time_series/macd | Momentum Indicators
*DataApi* | [**getTechnicalIndicatorObv**](docs/Api/DataApi.md#gettechnicalindicatorobv) | **GET** /time_series/obv | Volume Indicators
*DataApi* | [**getTechnicalIndicatorRsi**](docs/Api/DataApi.md#gettechnicalindicatorrsi) | **GET** /time_series/rsi | Momentum Indicators
*DataApi* | [**getTechnicalIndicatorSar**](docs/Api/DataApi.md#gettechnicalindicatorsar) | **GET** /time_series/sar | Overlap Studies
*DataApi* | [**getTechnicalIndicatorStoch**](docs/Api/DataApi.md#gettechnicalindicatorstoch) | **GET** /time_series/stoch | Momentum Indicators
*DataApi* | [**getTickerSnapshot**](docs/Api/DataApi.md#gettickersnapshot) | **GET** /ticker/snapshot | Ticker snapshot
*DataApi* | [**getTrades**](docs/Api/DataApi.md#gettrades) | **GET** /trades | Trades
*DefaultApi* | [**reference**](docs/Api/DefaultApi.md#reference) | **GET** /my_datasets | My Datasets
*ReferenceApi* | [**getApiUsage**](docs/Api/ReferenceApi.md#getapiusage) | **GET** /api_usage | Api usage
*ReferenceApi* | [**getDatasets**](docs/Api/ReferenceApi.md#getdatasets) | **GET** /datasets | List of Finazon datasets
*ReferenceApi* | [**getExchangesCrypto**](docs/Api/ReferenceApi.md#getexchangescrypto) | **GET** /markets/crypto | List of crypto markets
*ReferenceApi* | [**getExchangesStocks**](docs/Api/ReferenceApi.md#getexchangesstocks) | **GET** /markets/stocks | List of stock markets
*ReferenceApi* | [**getMarketCenter**](docs/Api/ReferenceApi.md#getmarketcenter) | **GET** /sip/market_center | List of market centers
*ReferenceApi* | [**getPublishers**](docs/Api/ReferenceApi.md#getpublishers) | **GET** /publishers | List of Finazon publishers
*ReferenceApi* | [**getSymbolsCrypto**](docs/Api/ReferenceApi.md#getsymbolscrypto) | **GET** /tickers/crypto | List of crypto pairs
*ReferenceApi* | [**getSymbolsForex**](docs/Api/ReferenceApi.md#getsymbolsforex) | **GET** /tickers/forex | List of forex ticker symbols
*ReferenceApi* | [**getSymbolsStocks**](docs/Api/ReferenceApi.md#getsymbolsstocks) | **GET** /tickers/stocks | List of stock ticker symbols
*ReferenceApi* | [**getSymbolsUSStocks**](docs/Api/ReferenceApi.md#getsymbolsusstocks) | **GET** /tickers/us_stocks | List of US stock ticker symbols
*TechnicalIndicatorApi* | [**getTechnicalIndicatorAtr**](docs/Api/TechnicalIndicatorApi.md#gettechnicalindicatoratr) | **GET** /time_series/atr | ATR Technical indicators
*TechnicalIndicatorApi* | [**getTechnicalIndicatorBBands**](docs/Api/TechnicalIndicatorApi.md#gettechnicalindicatorbbands) | **GET** /time_series/bbands | Overlap Studies
*TechnicalIndicatorApi* | [**getTechnicalIndicatorIchimoku**](docs/Api/TechnicalIndicatorApi.md#gettechnicalindicatorichimoku) | **GET** /time_series/ichimoku | Overlap Studies
*TechnicalIndicatorApi* | [**getTechnicalIndicatorMa**](docs/Api/TechnicalIndicatorApi.md#gettechnicalindicatorma) | **GET** /time_series/ma | Overlap Studies
*TechnicalIndicatorApi* | [**getTechnicalIndicatorMacd**](docs/Api/TechnicalIndicatorApi.md#gettechnicalindicatormacd) | **GET** /time_series/macd | Momentum Indicators
*TechnicalIndicatorApi* | [**getTechnicalIndicatorObv**](docs/Api/TechnicalIndicatorApi.md#gettechnicalindicatorobv) | **GET** /time_series/obv | Volume Indicators
*TechnicalIndicatorApi* | [**getTechnicalIndicatorRsi**](docs/Api/TechnicalIndicatorApi.md#gettechnicalindicatorrsi) | **GET** /time_series/rsi | Momentum Indicators
*TechnicalIndicatorApi* | [**getTechnicalIndicatorSar**](docs/Api/TechnicalIndicatorApi.md#gettechnicalindicatorsar) | **GET** /time_series/sar | Overlap Studies
*TechnicalIndicatorApi* | [**getTechnicalIndicatorStoch**](docs/Api/TechnicalIndicatorApi.md#gettechnicalindicatorstoch) | **GET** /time_series/stoch | Momentum Indicators

## Documentation For Models

 - [ApiCalls](docs/Model/ApiCalls.md)
 - [ApiUsageItem](docs/Model/ApiUsageItem.md)
 - [ApiUsageResponseBody](docs/Model/ApiUsageResponseBody.md)
 - [BaseResponseBody](docs/Model/BaseResponseBody.md)
 - [BenzingaDividendsCalendarResponseBody](docs/Model/BenzingaDividendsCalendarResponseBody.md)
 - [BenzingaEarningsCalendarResponseBody](docs/Model/BenzingaEarningsCalendarResponseBody.md)
 - [BenzingaIPOResponseBody](docs/Model/BenzingaIPOResponseBody.md)
 - [BenzingaNewsResponseBody](docs/Model/BenzingaNewsResponseBody.md)
 - [DatasetDetailItem](docs/Model/DatasetDetailItem.md)
 - [DatasetItem](docs/Model/DatasetItem.md)
 - [DatasetsResponseBody](docs/Model/DatasetsResponseBody.md)
 - [DividendsCalendarItem](docs/Model/DividendsCalendarItem.md)
 - [EarningsCalendarItem](docs/Model/EarningsCalendarItem.md)
 - [EarningsCalendarItemEps](docs/Model/EarningsCalendarItemEps.md)
 - [EarningsCalendarItemRevenue](docs/Model/EarningsCalendarItemRevenue.md)
 - [ExchangeCryptoItem](docs/Model/ExchangeCryptoItem.md)
 - [ExchangeStocksItem](docs/Model/ExchangeStocksItem.md)
 - [ExchangesCryptoResponseBody](docs/Model/ExchangesCryptoResponseBody.md)
 - [ExchangesStocksResponseBody](docs/Model/ExchangesStocksResponseBody.md)
 - [Filing](docs/Model/Filing.md)
 - [FilingFile](docs/Model/FilingFile.md)
 - [IPOItem](docs/Model/IPOItem.md)
 - [InlineResponse200](docs/Model/InlineResponse200.md)
 - [MarketCenterItem](docs/Model/MarketCenterItem.md)
 - [MarketCenterResponseBody](docs/Model/MarketCenterResponseBody.md)
 - [Meta](docs/Model/Meta.md)
 - [MyDatasetItem](docs/Model/MyDatasetItem.md)
 - [NewsItem](docs/Model/NewsItem.md)
 - [PaginationMeta](docs/Model/PaginationMeta.md)
 - [PriceResponseBody](docs/Model/PriceResponseBody.md)
 - [PublisherItem](docs/Model/PublisherItem.md)
 - [PublishersResponseBody](docs/Model/PublishersResponseBody.md)
 - [QuoteBinanceItem](docs/Model/QuoteBinanceItem.md)
 - [QuoteForexItem](docs/Model/QuoteForexItem.md)
 - [QuoteItem](docs/Model/QuoteItem.md)
 - [SipTradesItem](docs/Model/SipTradesItem.md)
 - [SymbolCrypto](docs/Model/SymbolCrypto.md)
 - [SymbolForex](docs/Model/SymbolForex.md)
 - [SymbolStocks](docs/Model/SymbolStocks.md)
 - [SymbolUSStocks](docs/Model/SymbolUSStocks.md)
 - [SymbolsCryptoResponseBody](docs/Model/SymbolsCryptoResponseBody.md)
 - [SymbolsForexResponseBody](docs/Model/SymbolsForexResponseBody.md)
 - [SymbolsStocksResponseBody](docs/Model/SymbolsStocksResponseBody.md)
 - [SymbolsUSStocksResponseBody](docs/Model/SymbolsUSStocksResponseBody.md)
 - [TechnicalIndicatorResponseAtr](docs/Model/TechnicalIndicatorResponseAtr.md)
 - [TechnicalIndicatorResponseBBands](docs/Model/TechnicalIndicatorResponseBBands.md)
 - [TechnicalIndicatorResponseData](docs/Model/TechnicalIndicatorResponseData.md)
 - [TechnicalIndicatorResponseIchimoku](docs/Model/TechnicalIndicatorResponseIchimoku.md)
 - [TechnicalIndicatorResponseMa](docs/Model/TechnicalIndicatorResponseMa.md)
 - [TechnicalIndicatorResponseMacd](docs/Model/TechnicalIndicatorResponseMacd.md)
 - [TechnicalIndicatorResponseObv](docs/Model/TechnicalIndicatorResponseObv.md)
 - [TechnicalIndicatorResponseRsi](docs/Model/TechnicalIndicatorResponseRsi.md)
 - [TechnicalIndicatorResponseSar](docs/Model/TechnicalIndicatorResponseSar.md)
 - [TechnicalIndicatorResponseStoch](docs/Model/TechnicalIndicatorResponseStoch.md)
 - [TickerSnapshotChange](docs/Model/TickerSnapshotChange.md)
 - [TickerSnapshotLastDay](docs/Model/TickerSnapshotLastDay.md)
 - [TickerSnapshotLastFiftyTwoWeek](docs/Model/TickerSnapshotLastFiftyTwoWeek.md)
 - [TickerSnapshotLastMonth](docs/Model/TickerSnapshotLastMonth.md)
 - [TickerSnapshotLastTrade](docs/Model/TickerSnapshotLastTrade.md)
 - [TickerSnapshotPreviousDay](docs/Model/TickerSnapshotPreviousDay.md)
 - [TradesItem](docs/Model/TradesItem.md)

## Documentation For Authorization


## api_key

- **Type**: API key
- **API key parameter name**: apikey
- **Location**: URL query string


## Author



