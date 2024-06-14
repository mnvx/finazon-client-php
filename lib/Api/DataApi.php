<?php
/**
 * DataApi
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Finazon API
 *
 * ## API reference  Finazon is a comprehensive financial data marketplace that enables developers to effortlessly integrate a wide variety of global datasets, including stocks, ETFs, cryptocurrencies, and more, all with fully customizable parameters.  The Finazon API is built around [REST](https://en.wikipedia.org/wiki/Representational_state_transfer) principles, featuring resource-oriented URLs with predictable behavior. The API accepts [form-encoded](https://en.wikipedia.org/wiki/POST_(HTTP)#Use_for_submitting_web_forms) request bodies, returns JSON-encoded responses, and utilizes standard HTTP response codes, authentication methods, and verbs.  The Finazon API doesn't support bulk updates. You can work on only one instrument per request.  ## Authentification  To authenticate requests, the Finazon API requires [API keys](https://finazon.io/account/developers/api-keys). You can obtain, view, and manage your API keys through the [Finazon Dashboard](https://finazon.io/account/home).  Your API keys hold significant privileges, so ensure their security by not sharing your secret API keys in publicly accessible areas, such as GitHub repositories, client-side code, or any other public platforms.  All API requests must be made over [HTTPS](http://en.wikipedia.org/wiki/HTTP_Secure). Calls over plain HTTP will fail, as will API requests without authentication.  Once you have your API key, include it in the parameters as follows:  ```bash https://api.finazon.io/latest?apikey=YOUR_API_KEY ```  Alternatively, pass it as a request header:  ```bash Authorization: apikey YOUR_API_KEY ```  ## Versioning  Whenever [backwards-incompatible](https://support.finazon.io/en/articles/7792859-api-upgrades#h_1e014217bf) changes are introduced to the API, a new dated version is released. Consult our [API upgrades guide](https://support.finazon.io/en/articles/7792859-api-upgrades) for more information on backwards compatibility, and view our API changelog for all API updates.  To always use the most up-to-date version, specify it as `/latest`:  ```bash https://api.finazon.io/latest ```  To access the most recent version of `v1.*`, use the following:  ```bash https://api.finazon.io/v1  ```  Or, to retrieve a specific version, call:  ```bash  https://api.finazon.io/v1.0 ```  Finazon will provide advance notice before deprecating older API versions, giving developers ample time to migrate to the updated version.  ## Endpoints structure  The Finazon API adheres to a consistent and structured pattern for its endpoints. The base URL for all requests is:  ```bash https://api.finazon.io/ ```  API endpoints are organized by resource types, including universal resources accessible across all publishers and publisher-specific resources. For example, the `/time_series` endpoint is compatible with all publishers that support this data format. Such responses will be standardized across all datasets, facilitating rapid integration of new markets into your applications.  ```bash https://api.finazon.io/latest/{{resource}} https://api.finazon.io/latest/time_series ```  Additionally, datasets may contain unique data exclusive to that dataset. In such cases, you might want to call a separate endpoint specifying the publisher to gather more data. For instance, the [Binance](https://finazon.io/dataset/binance) dataset time series can be requested as:  ```bash  https://api.finazon.io/latest/{{publisher}}/{{resource}} https://api.finazon.io/latest/binance/time_series ```  ## Parameters  Each API request has its own set of required and optional parameters. Parameters should be separated by an ampersand. Parameter names are case-sensitive, while parameter values are not. Each API request has its own set of required and optional parameters. Parameters should be separated by an ampersand. Parameter names and parameter values are case-sensitive  ```bash https://api.finazon.io/latest/time_series?dataset=sip_non_pro&ticker=AAPL&interval=1m&apikey= ```  ### Pagination  All API resources supporting bulk fetches are retrieved via \"list\" API methods. For example, you can list time series, list trades, and list quotes. These list API methods share a common structure, accepting at least these five parameters: `page`, `page_size`, `order`, `start_at`, and `end_at`.  The response of a list API method represents a single page in a reverse chronological stream of objects. If you do not specify `start_at` or `end_at`, you will receive the first page of this list, containing the newest objects. By default, you will receive 10 objects if you do not specify an alternative value for `page_size`. You can specify `start_at` equal to the T (timestamp) value of an item to retrieve the page of older objects occurring immediately after the specified timestamp in the reverse chronological stream. Similarly, you can specify `end_at` to receive a page of newer objects occurring immediately before the named object in the stream. You can use one of `start_at` or `end_at` or both. Objects in a page always appear in reverse chronological order, unless `order` is specified.  ## Errors  Finazon employs standard HTTP response codes to signify the success or failure of an API request. Generally, the response codes can be interpreted as follows:  `2xx` range codes indicate a successful request.  `4xx` range codes signify an error resulting from the provided information (e.g., invalid API key, API rate limit exceeded, etc.).  `5xx` range codes represent errors originating from Finazon's servers (these are rare occurrences).  For all `4xx`errors that can be addressed programmatically (e.g., endpoint not found), an error message is included to succinctly explain the reported issue. This allows developers to quickly identify and resolve errors in their API requests.   status | code | message | --------|:-----|:--------|  400 |  INVALID_PARAMETER | The **{parameter_name}** parameter is missing or invalid. |  400 |  INVALID_DATE_RANGE | The requested date range is invalid or unsupported. |  400 |  UNSUPPORTED_MARKET | The requested market or exchange is not supported by the API. Please check the supported markets and try again. |  400 |  INVALID_TICKER | The provided ticker is invalid or unsupported. |  401 |  UNAUTHORIZED_ACCESS | You are not authorized to access the requested endpoint or you have insufficient permissions. |  404 |  ENDPOINT_NOT_FOUND | The requested endpoint **{endpoint_name}** does not exist or could not be found. |  429 |  API_RATE_LIMIT_EXCEEDED | You have exceeded the allowed number of API calls within the minute. Please wait and try again later. |  401 |  INVALID_API_KEY | The provided API key is invalid or has expired. Please check your API key and try again |  408 |  REQUEST_TIMEOUT | The request took too long to complete and timed out. Please try again later or reduce the complexity of your query. |  503 |  DATA_UNAVAILABLE | The requested data is temporarily unavailable or not supported. Please try again later or check the availability of the data. |  500 |  INTERNAL_SERVER_ERROR | An error occurred on the server-side while processing the request. Please try again later. If the issue persists, contact support. |
 *
 * OpenAPI spec version: v1.2
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.57
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Swagger\Client\ApiException;
use Swagger\Client\Configuration;
use Swagger\Client\HeaderSelector;
use Swagger\Client\ObjectSerializer;

/**
 * DataApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DataApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getBenzingaDividendsCalendar
     *
     * Dividends calendar
     *
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $date Specifies the exact date to get the data for (optional)
     * @param  int $start_at Filter events by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter events by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 100)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\BenzingaDividendsCalendarResponseBody
     */
    public function getBenzingaDividendsCalendar($ticker, $date = null, $start_at = null, $end_at = null, $page = '0', $page_size = '100', $order = 'desc', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null)
    {
        list($response) = $this->getBenzingaDividendsCalendarWithHttpInfo($ticker, $date, $start_at, $end_at, $page, $page_size, $order, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei);
        return $response;
    }

    /**
     * Operation getBenzingaDividendsCalendarWithHttpInfo
     *
     * Dividends calendar
     *
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $date Specifies the exact date to get the data for (optional)
     * @param  int $start_at Filter events by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter events by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 100)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\BenzingaDividendsCalendarResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function getBenzingaDividendsCalendarWithHttpInfo($ticker, $date = null, $start_at = null, $end_at = null, $page = '0', $page_size = '100', $order = 'desc', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null)
    {
        $returnType = '\Swagger\Client\Model\BenzingaDividendsCalendarResponseBody';
        $request = $this->getBenzingaDividendsCalendarRequest($ticker, $date, $start_at, $end_at, $page, $page_size, $order, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\BenzingaDividendsCalendarResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getBenzingaDividendsCalendarAsync
     *
     * Dividends calendar
     *
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $date Specifies the exact date to get the data for (optional)
     * @param  int $start_at Filter events by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter events by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 100)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getBenzingaDividendsCalendarAsync($ticker, $date = null, $start_at = null, $end_at = null, $page = '0', $page_size = '100', $order = 'desc', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null)
    {
        return $this->getBenzingaDividendsCalendarAsyncWithHttpInfo($ticker, $date, $start_at, $end_at, $page, $page_size, $order, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getBenzingaDividendsCalendarAsyncWithHttpInfo
     *
     * Dividends calendar
     *
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $date Specifies the exact date to get the data for (optional)
     * @param  int $start_at Filter events by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter events by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 100)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getBenzingaDividendsCalendarAsyncWithHttpInfo($ticker, $date = null, $start_at = null, $end_at = null, $page = '0', $page_size = '100', $order = 'desc', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null)
    {
        $returnType = '\Swagger\Client\Model\BenzingaDividendsCalendarResponseBody';
        $request = $this->getBenzingaDividendsCalendarRequest($ticker, $date, $start_at, $end_at, $page, $page_size, $order, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getBenzingaDividendsCalendar'
     *
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $date Specifies the exact date to get the data for (optional)
     * @param  int $start_at Filter events by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter events by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 100)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getBenzingaDividendsCalendarRequest($ticker, $date = null, $start_at = null, $end_at = null, $page = '0', $page_size = '100', $order = 'desc', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null)
    {
        // verify the required parameter 'ticker' is set
        if ($ticker === null || (is_array($ticker) && count($ticker) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ticker when calling getBenzingaDividendsCalendar'
            );
        }

        $resourcePath = '/benzinga/dividends_calendar';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }
        // query params
        if ($date !== null) {
            $queryParams['date'] = ObjectSerializer::toQueryValue($date, null);
        }
        // query params
        if ($start_at !== null) {
            $queryParams['start_at'] = ObjectSerializer::toQueryValue($start_at, 'int64');
        }
        // query params
        if ($end_at !== null) {
            $queryParams['end_at'] = ObjectSerializer::toQueryValue($end_at, 'int64');
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page, 'int32');
        }
        // query params
        if ($page_size !== null) {
            $queryParams['page_size'] = ObjectSerializer::toQueryValue($page_size, 'int32');
        }
        // query params
        if ($order !== null) {
            $queryParams['order'] = ObjectSerializer::toQueryValue($order, null);
        }
        // query params
        if ($cqs !== null) {
            $queryParams['cqs'] = ObjectSerializer::toQueryValue($cqs, null);
        }
        // query params
        if ($cik !== null) {
            $queryParams['cik'] = ObjectSerializer::toQueryValue($cik, null);
        }
        // query params
        if ($cusip !== null) {
            $queryParams['cusip'] = ObjectSerializer::toQueryValue($cusip, null);
        }
        // query params
        if ($isin !== null) {
            $queryParams['isin'] = ObjectSerializer::toQueryValue($isin, null);
        }
        // query params
        if ($composite_figi !== null) {
            $queryParams['composite_figi'] = ObjectSerializer::toQueryValue($composite_figi, null);
        }
        // query params
        if ($share_figi !== null) {
            $queryParams['share_figi'] = ObjectSerializer::toQueryValue($share_figi, null);
        }
        // query params
        if ($lei !== null) {
            $queryParams['lei'] = ObjectSerializer::toQueryValue($lei, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getBenzingaEarningsCalendar
     *
     * Earnings calendar
     *
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $date Specifies the exact date to get the data for (optional)
     * @param  int $start_at Filter events by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter events by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 100)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\BenzingaEarningsCalendarResponseBody
     */
    public function getBenzingaEarningsCalendar($ticker, $date = null, $start_at = null, $end_at = null, $page = '0', $page_size = '100', $order = 'desc', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null)
    {
        list($response) = $this->getBenzingaEarningsCalendarWithHttpInfo($ticker, $date, $start_at, $end_at, $page, $page_size, $order, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei);
        return $response;
    }

    /**
     * Operation getBenzingaEarningsCalendarWithHttpInfo
     *
     * Earnings calendar
     *
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $date Specifies the exact date to get the data for (optional)
     * @param  int $start_at Filter events by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter events by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 100)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\BenzingaEarningsCalendarResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function getBenzingaEarningsCalendarWithHttpInfo($ticker, $date = null, $start_at = null, $end_at = null, $page = '0', $page_size = '100', $order = 'desc', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null)
    {
        $returnType = '\Swagger\Client\Model\BenzingaEarningsCalendarResponseBody';
        $request = $this->getBenzingaEarningsCalendarRequest($ticker, $date, $start_at, $end_at, $page, $page_size, $order, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\BenzingaEarningsCalendarResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getBenzingaEarningsCalendarAsync
     *
     * Earnings calendar
     *
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $date Specifies the exact date to get the data for (optional)
     * @param  int $start_at Filter events by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter events by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 100)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getBenzingaEarningsCalendarAsync($ticker, $date = null, $start_at = null, $end_at = null, $page = '0', $page_size = '100', $order = 'desc', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null)
    {
        return $this->getBenzingaEarningsCalendarAsyncWithHttpInfo($ticker, $date, $start_at, $end_at, $page, $page_size, $order, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getBenzingaEarningsCalendarAsyncWithHttpInfo
     *
     * Earnings calendar
     *
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $date Specifies the exact date to get the data for (optional)
     * @param  int $start_at Filter events by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter events by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 100)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getBenzingaEarningsCalendarAsyncWithHttpInfo($ticker, $date = null, $start_at = null, $end_at = null, $page = '0', $page_size = '100', $order = 'desc', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null)
    {
        $returnType = '\Swagger\Client\Model\BenzingaEarningsCalendarResponseBody';
        $request = $this->getBenzingaEarningsCalendarRequest($ticker, $date, $start_at, $end_at, $page, $page_size, $order, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getBenzingaEarningsCalendar'
     *
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $date Specifies the exact date to get the data for (optional)
     * @param  int $start_at Filter events by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter events by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 100)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getBenzingaEarningsCalendarRequest($ticker, $date = null, $start_at = null, $end_at = null, $page = '0', $page_size = '100', $order = 'desc', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null)
    {
        // verify the required parameter 'ticker' is set
        if ($ticker === null || (is_array($ticker) && count($ticker) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ticker when calling getBenzingaEarningsCalendar'
            );
        }

        $resourcePath = '/benzinga/earnings_calendar';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }
        // query params
        if ($date !== null) {
            $queryParams['date'] = ObjectSerializer::toQueryValue($date, null);
        }
        // query params
        if ($start_at !== null) {
            $queryParams['start_at'] = ObjectSerializer::toQueryValue($start_at, 'int64');
        }
        // query params
        if ($end_at !== null) {
            $queryParams['end_at'] = ObjectSerializer::toQueryValue($end_at, 'int64');
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page, 'int32');
        }
        // query params
        if ($page_size !== null) {
            $queryParams['page_size'] = ObjectSerializer::toQueryValue($page_size, 'int32');
        }
        // query params
        if ($order !== null) {
            $queryParams['order'] = ObjectSerializer::toQueryValue($order, null);
        }
        // query params
        if ($cqs !== null) {
            $queryParams['cqs'] = ObjectSerializer::toQueryValue($cqs, null);
        }
        // query params
        if ($cik !== null) {
            $queryParams['cik'] = ObjectSerializer::toQueryValue($cik, null);
        }
        // query params
        if ($cusip !== null) {
            $queryParams['cusip'] = ObjectSerializer::toQueryValue($cusip, null);
        }
        // query params
        if ($isin !== null) {
            $queryParams['isin'] = ObjectSerializer::toQueryValue($isin, null);
        }
        // query params
        if ($composite_figi !== null) {
            $queryParams['composite_figi'] = ObjectSerializer::toQueryValue($composite_figi, null);
        }
        // query params
        if ($share_figi !== null) {
            $queryParams['share_figi'] = ObjectSerializer::toQueryValue($share_figi, null);
        }
        // query params
        if ($lei !== null) {
            $queryParams['lei'] = ObjectSerializer::toQueryValue($lei, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getBenzingaIPO
     *
     * IPO data
     *
     * @param  int $start_at Filter events by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter events by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 100)
     * @param  string $order Sorting order of the output series (optional, default to asc)
     * @param  string $exchange Exchange where instrument is traded (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\BenzingaIPOResponseBody
     */
    public function getBenzingaIPO($start_at = null, $end_at = null, $page = '0', $page_size = '100', $order = 'asc', $exchange = null)
    {
        list($response) = $this->getBenzingaIPOWithHttpInfo($start_at, $end_at, $page, $page_size, $order, $exchange);
        return $response;
    }

    /**
     * Operation getBenzingaIPOWithHttpInfo
     *
     * IPO data
     *
     * @param  int $start_at Filter events by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter events by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 100)
     * @param  string $order Sorting order of the output series (optional, default to asc)
     * @param  string $exchange Exchange where instrument is traded (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\BenzingaIPOResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function getBenzingaIPOWithHttpInfo($start_at = null, $end_at = null, $page = '0', $page_size = '100', $order = 'asc', $exchange = null)
    {
        $returnType = '\Swagger\Client\Model\BenzingaIPOResponseBody';
        $request = $this->getBenzingaIPORequest($start_at, $end_at, $page, $page_size, $order, $exchange);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\BenzingaIPOResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getBenzingaIPOAsync
     *
     * IPO data
     *
     * @param  int $start_at Filter events by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter events by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 100)
     * @param  string $order Sorting order of the output series (optional, default to asc)
     * @param  string $exchange Exchange where instrument is traded (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getBenzingaIPOAsync($start_at = null, $end_at = null, $page = '0', $page_size = '100', $order = 'asc', $exchange = null)
    {
        return $this->getBenzingaIPOAsyncWithHttpInfo($start_at, $end_at, $page, $page_size, $order, $exchange)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getBenzingaIPOAsyncWithHttpInfo
     *
     * IPO data
     *
     * @param  int $start_at Filter events by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter events by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 100)
     * @param  string $order Sorting order of the output series (optional, default to asc)
     * @param  string $exchange Exchange where instrument is traded (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getBenzingaIPOAsyncWithHttpInfo($start_at = null, $end_at = null, $page = '0', $page_size = '100', $order = 'asc', $exchange = null)
    {
        $returnType = '\Swagger\Client\Model\BenzingaIPOResponseBody';
        $request = $this->getBenzingaIPORequest($start_at, $end_at, $page, $page_size, $order, $exchange);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getBenzingaIPO'
     *
     * @param  int $start_at Filter events by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter events by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 100)
     * @param  string $order Sorting order of the output series (optional, default to asc)
     * @param  string $exchange Exchange where instrument is traded (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getBenzingaIPORequest($start_at = null, $end_at = null, $page = '0', $page_size = '100', $order = 'asc', $exchange = null)
    {

        $resourcePath = '/benzinga/ipo';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($start_at !== null) {
            $queryParams['start_at'] = ObjectSerializer::toQueryValue($start_at, 'int64');
        }
        // query params
        if ($end_at !== null) {
            $queryParams['end_at'] = ObjectSerializer::toQueryValue($end_at, 'int64');
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page, 'int32');
        }
        // query params
        if ($page_size !== null) {
            $queryParams['page_size'] = ObjectSerializer::toQueryValue($page_size, 'int32');
        }
        // query params
        if ($order !== null) {
            $queryParams['order'] = ObjectSerializer::toQueryValue($order, null);
        }
        // query params
        if ($exchange !== null) {
            $queryParams['exchange'] = ObjectSerializer::toQueryValue($exchange, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getBenzingaNews
     *
     * News articles
     *
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $date Specifies the exact date to get the data for (optional)
     * @param  int $start_at Filter events by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter events by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 100)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\BenzingaNewsResponseBody
     */
    public function getBenzingaNews($ticker, $date = null, $start_at = null, $end_at = null, $page = '0', $page_size = '100', $order = 'desc', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null)
    {
        list($response) = $this->getBenzingaNewsWithHttpInfo($ticker, $date, $start_at, $end_at, $page, $page_size, $order, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei);
        return $response;
    }

    /**
     * Operation getBenzingaNewsWithHttpInfo
     *
     * News articles
     *
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $date Specifies the exact date to get the data for (optional)
     * @param  int $start_at Filter events by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter events by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 100)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\BenzingaNewsResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function getBenzingaNewsWithHttpInfo($ticker, $date = null, $start_at = null, $end_at = null, $page = '0', $page_size = '100', $order = 'desc', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null)
    {
        $returnType = '\Swagger\Client\Model\BenzingaNewsResponseBody';
        $request = $this->getBenzingaNewsRequest($ticker, $date, $start_at, $end_at, $page, $page_size, $order, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\BenzingaNewsResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getBenzingaNewsAsync
     *
     * News articles
     *
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $date Specifies the exact date to get the data for (optional)
     * @param  int $start_at Filter events by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter events by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 100)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getBenzingaNewsAsync($ticker, $date = null, $start_at = null, $end_at = null, $page = '0', $page_size = '100', $order = 'desc', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null)
    {
        return $this->getBenzingaNewsAsyncWithHttpInfo($ticker, $date, $start_at, $end_at, $page, $page_size, $order, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getBenzingaNewsAsyncWithHttpInfo
     *
     * News articles
     *
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $date Specifies the exact date to get the data for (optional)
     * @param  int $start_at Filter events by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter events by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 100)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getBenzingaNewsAsyncWithHttpInfo($ticker, $date = null, $start_at = null, $end_at = null, $page = '0', $page_size = '100', $order = 'desc', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null)
    {
        $returnType = '\Swagger\Client\Model\BenzingaNewsResponseBody';
        $request = $this->getBenzingaNewsRequest($ticker, $date, $start_at, $end_at, $page, $page_size, $order, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getBenzingaNews'
     *
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $date Specifies the exact date to get the data for (optional)
     * @param  int $start_at Filter events by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter events by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 100)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getBenzingaNewsRequest($ticker, $date = null, $start_at = null, $end_at = null, $page = '0', $page_size = '100', $order = 'desc', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null)
    {
        // verify the required parameter 'ticker' is set
        if ($ticker === null || (is_array($ticker) && count($ticker) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ticker when calling getBenzingaNews'
            );
        }

        $resourcePath = '/benzinga/news';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }
        // query params
        if ($date !== null) {
            $queryParams['date'] = ObjectSerializer::toQueryValue($date, null);
        }
        // query params
        if ($start_at !== null) {
            $queryParams['start_at'] = ObjectSerializer::toQueryValue($start_at, 'int64');
        }
        // query params
        if ($end_at !== null) {
            $queryParams['end_at'] = ObjectSerializer::toQueryValue($end_at, 'int64');
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page, 'int32');
        }
        // query params
        if ($page_size !== null) {
            $queryParams['page_size'] = ObjectSerializer::toQueryValue($page_size, 'int32');
        }
        // query params
        if ($order !== null) {
            $queryParams['order'] = ObjectSerializer::toQueryValue($order, null);
        }
        // query params
        if ($cqs !== null) {
            $queryParams['cqs'] = ObjectSerializer::toQueryValue($cqs, null);
        }
        // query params
        if ($cik !== null) {
            $queryParams['cik'] = ObjectSerializer::toQueryValue($cik, null);
        }
        // query params
        if ($cusip !== null) {
            $queryParams['cusip'] = ObjectSerializer::toQueryValue($cusip, null);
        }
        // query params
        if ($isin !== null) {
            $queryParams['isin'] = ObjectSerializer::toQueryValue($isin, null);
        }
        // query params
        if ($composite_figi !== null) {
            $queryParams['composite_figi'] = ObjectSerializer::toQueryValue($composite_figi, null);
        }
        // query params
        if ($share_figi !== null) {
            $queryParams['share_figi'] = ObjectSerializer::toQueryValue($share_figi, null);
        }
        // query params
        if ($lei !== null) {
            $queryParams['lei'] = ObjectSerializer::toQueryValue($lei, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getBinanceQuotes
     *
     * Time series
     *
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\QuoteBinanceItem[]
     */
    public function getBinanceQuotes($ticker, $interval, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc')
    {
        list($response) = $this->getBinanceQuotesWithHttpInfo($ticker, $interval, $start_at, $end_at, $page, $page_size, $order);
        return $response;
    }

    /**
     * Operation getBinanceQuotesWithHttpInfo
     *
     * Time series
     *
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\QuoteBinanceItem[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getBinanceQuotesWithHttpInfo($ticker, $interval, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc')
    {
        $returnType = '\Swagger\Client\Model\QuoteBinanceItem[]';
        $request = $this->getBinanceQuotesRequest($ticker, $interval, $start_at, $end_at, $page, $page_size, $order);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\QuoteBinanceItem[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getBinanceQuotesAsync
     *
     * Time series
     *
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getBinanceQuotesAsync($ticker, $interval, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc')
    {
        return $this->getBinanceQuotesAsyncWithHttpInfo($ticker, $interval, $start_at, $end_at, $page, $page_size, $order)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getBinanceQuotesAsyncWithHttpInfo
     *
     * Time series
     *
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getBinanceQuotesAsyncWithHttpInfo($ticker, $interval, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc')
    {
        $returnType = '\Swagger\Client\Model\QuoteBinanceItem[]';
        $request = $this->getBinanceQuotesRequest($ticker, $interval, $start_at, $end_at, $page, $page_size, $order);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getBinanceQuotes'
     *
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getBinanceQuotesRequest($ticker, $interval, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc')
    {
        // verify the required parameter 'ticker' is set
        if ($ticker === null || (is_array($ticker) && count($ticker) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ticker when calling getBinanceQuotes'
            );
        }
        // verify the required parameter 'interval' is set
        if ($interval === null || (is_array($interval) && count($interval) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $interval when calling getBinanceQuotes'
            );
        }

        $resourcePath = '/binance/time_series';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }
        // query params
        if ($interval !== null) {
            $queryParams['interval'] = ObjectSerializer::toQueryValue($interval, null);
        }
        // query params
        if ($start_at !== null) {
            $queryParams['start_at'] = ObjectSerializer::toQueryValue($start_at, 'int64');
        }
        // query params
        if ($end_at !== null) {
            $queryParams['end_at'] = ObjectSerializer::toQueryValue($end_at, 'int64');
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page, 'int32');
        }
        // query params
        if ($page_size !== null) {
            $queryParams['page_size'] = ObjectSerializer::toQueryValue($page_size, 'int32');
        }
        // query params
        if ($order !== null) {
            $queryParams['order'] = ObjectSerializer::toQueryValue($order, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getCryptoQuotes
     *
     * Time series
     *
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\QuoteItem[]
     */
    public function getCryptoQuotes($interval, $ticker, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc')
    {
        list($response) = $this->getCryptoQuotesWithHttpInfo($interval, $ticker, $start_at, $end_at, $page, $page_size, $order);
        return $response;
    }

    /**
     * Operation getCryptoQuotesWithHttpInfo
     *
     * Time series
     *
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\QuoteItem[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getCryptoQuotesWithHttpInfo($interval, $ticker, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc')
    {
        $returnType = '\Swagger\Client\Model\QuoteItem[]';
        $request = $this->getCryptoQuotesRequest($interval, $ticker, $start_at, $end_at, $page, $page_size, $order);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\QuoteItem[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getCryptoQuotesAsync
     *
     * Time series
     *
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getCryptoQuotesAsync($interval, $ticker, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc')
    {
        return $this->getCryptoQuotesAsyncWithHttpInfo($interval, $ticker, $start_at, $end_at, $page, $page_size, $order)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getCryptoQuotesAsyncWithHttpInfo
     *
     * Time series
     *
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getCryptoQuotesAsyncWithHttpInfo($interval, $ticker, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc')
    {
        $returnType = '\Swagger\Client\Model\QuoteItem[]';
        $request = $this->getCryptoQuotesRequest($interval, $ticker, $start_at, $end_at, $page, $page_size, $order);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getCryptoQuotes'
     *
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getCryptoQuotesRequest($interval, $ticker, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc')
    {
        // verify the required parameter 'interval' is set
        if ($interval === null || (is_array($interval) && count($interval) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $interval when calling getCryptoQuotes'
            );
        }
        // verify the required parameter 'ticker' is set
        if ($ticker === null || (is_array($ticker) && count($ticker) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ticker when calling getCryptoQuotes'
            );
        }

        $resourcePath = '/crypto/time_series';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($interval !== null) {
            $queryParams['interval'] = ObjectSerializer::toQueryValue($interval, null);
        }
        // query params
        if ($start_at !== null) {
            $queryParams['start_at'] = ObjectSerializer::toQueryValue($start_at, 'int64');
        }
        // query params
        if ($end_at !== null) {
            $queryParams['end_at'] = ObjectSerializer::toQueryValue($end_at, 'int64');
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page, 'int32');
        }
        // query params
        if ($page_size !== null) {
            $queryParams['page_size'] = ObjectSerializer::toQueryValue($page_size, 'int32');
        }
        // query params
        if ($order !== null) {
            $queryParams['order'] = ObjectSerializer::toQueryValue($order, null);
        }
        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getFilings
     *
     * Filings
     *
     * @param  int $cik_code Filter by Central Index Key (optional)
     * @param  string $ticker Filter by ticker (optional)
     * @param  string $form_type Filter by form types (optional)
     * @param  int $filled_from_ts Filter by filled time from (optional)
     * @param  int $filled_to_ts Filter by filled time to (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 10)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\Filing[]
     */
    public function getFilings($cik_code = null, $ticker = null, $form_type = null, $filled_from_ts = null, $filled_to_ts = null, $page = '0', $page_size = '10', $cqs = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null)
    {
        list($response) = $this->getFilingsWithHttpInfo($cik_code, $ticker, $form_type, $filled_from_ts, $filled_to_ts, $page, $page_size, $cqs, $cusip, $isin, $composite_figi, $share_figi, $lei);
        return $response;
    }

    /**
     * Operation getFilingsWithHttpInfo
     *
     * Filings
     *
     * @param  int $cik_code Filter by Central Index Key (optional)
     * @param  string $ticker Filter by ticker (optional)
     * @param  string $form_type Filter by form types (optional)
     * @param  int $filled_from_ts Filter by filled time from (optional)
     * @param  int $filled_to_ts Filter by filled time to (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 10)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\Filing[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getFilingsWithHttpInfo($cik_code = null, $ticker = null, $form_type = null, $filled_from_ts = null, $filled_to_ts = null, $page = '0', $page_size = '10', $cqs = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null)
    {
        $returnType = '\Swagger\Client\Model\Filing[]';
        $request = $this->getFilingsRequest($cik_code, $ticker, $form_type, $filled_from_ts, $filled_to_ts, $page, $page_size, $cqs, $cusip, $isin, $composite_figi, $share_figi, $lei);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\Filing[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getFilingsAsync
     *
     * Filings
     *
     * @param  int $cik_code Filter by Central Index Key (optional)
     * @param  string $ticker Filter by ticker (optional)
     * @param  string $form_type Filter by form types (optional)
     * @param  int $filled_from_ts Filter by filled time from (optional)
     * @param  int $filled_to_ts Filter by filled time to (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 10)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getFilingsAsync($cik_code = null, $ticker = null, $form_type = null, $filled_from_ts = null, $filled_to_ts = null, $page = '0', $page_size = '10', $cqs = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null)
    {
        return $this->getFilingsAsyncWithHttpInfo($cik_code, $ticker, $form_type, $filled_from_ts, $filled_to_ts, $page, $page_size, $cqs, $cusip, $isin, $composite_figi, $share_figi, $lei)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getFilingsAsyncWithHttpInfo
     *
     * Filings
     *
     * @param  int $cik_code Filter by Central Index Key (optional)
     * @param  string $ticker Filter by ticker (optional)
     * @param  string $form_type Filter by form types (optional)
     * @param  int $filled_from_ts Filter by filled time from (optional)
     * @param  int $filled_to_ts Filter by filled time to (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 10)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getFilingsAsyncWithHttpInfo($cik_code = null, $ticker = null, $form_type = null, $filled_from_ts = null, $filled_to_ts = null, $page = '0', $page_size = '10', $cqs = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null)
    {
        $returnType = '\Swagger\Client\Model\Filing[]';
        $request = $this->getFilingsRequest($cik_code, $ticker, $form_type, $filled_from_ts, $filled_to_ts, $page, $page_size, $cqs, $cusip, $isin, $composite_figi, $share_figi, $lei);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getFilings'
     *
     * @param  int $cik_code Filter by Central Index Key (optional)
     * @param  string $ticker Filter by ticker (optional)
     * @param  string $form_type Filter by form types (optional)
     * @param  int $filled_from_ts Filter by filled time from (optional)
     * @param  int $filled_to_ts Filter by filled time to (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 10)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getFilingsRequest($cik_code = null, $ticker = null, $form_type = null, $filled_from_ts = null, $filled_to_ts = null, $page = '0', $page_size = '10', $cqs = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null)
    {

        $resourcePath = '/sec/archive';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($cik_code !== null) {
            $queryParams['cik_code'] = ObjectSerializer::toQueryValue($cik_code, 'int64');
        }
        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }
        // query params
        if ($form_type !== null) {
            $queryParams['form_type'] = ObjectSerializer::toQueryValue($form_type, null);
        }
        // query params
        if ($filled_from_ts !== null) {
            $queryParams['filled_from_ts'] = ObjectSerializer::toQueryValue($filled_from_ts, 'int64');
        }
        // query params
        if ($filled_to_ts !== null) {
            $queryParams['filled_to_ts'] = ObjectSerializer::toQueryValue($filled_to_ts, 'int64');
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page, 'int32');
        }
        // query params
        if ($page_size !== null) {
            $queryParams['page_size'] = ObjectSerializer::toQueryValue($page_size, 'int32');
        }
        // query params
        if ($cqs !== null) {
            $queryParams['cqs'] = ObjectSerializer::toQueryValue($cqs, null);
        }
        // query params
        if ($cusip !== null) {
            $queryParams['cusip'] = ObjectSerializer::toQueryValue($cusip, null);
        }
        // query params
        if ($isin !== null) {
            $queryParams['isin'] = ObjectSerializer::toQueryValue($isin, null);
        }
        // query params
        if ($composite_figi !== null) {
            $queryParams['composite_figi'] = ObjectSerializer::toQueryValue($composite_figi, null);
        }
        // query params
        if ($share_figi !== null) {
            $queryParams['share_figi'] = ObjectSerializer::toQueryValue($share_figi, null);
        }
        // query params
        if ($lei !== null) {
            $queryParams['lei'] = ObjectSerializer::toQueryValue($lei, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getForexQuotes
     *
     * Time series
     *
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\QuoteForexItem[]
     */
    public function getForexQuotes($interval, $ticker, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc')
    {
        list($response) = $this->getForexQuotesWithHttpInfo($interval, $ticker, $start_at, $end_at, $page, $page_size, $order);
        return $response;
    }

    /**
     * Operation getForexQuotesWithHttpInfo
     *
     * Time series
     *
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\QuoteForexItem[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getForexQuotesWithHttpInfo($interval, $ticker, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc')
    {
        $returnType = '\Swagger\Client\Model\QuoteForexItem[]';
        $request = $this->getForexQuotesRequest($interval, $ticker, $start_at, $end_at, $page, $page_size, $order);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\QuoteForexItem[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getForexQuotesAsync
     *
     * Time series
     *
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getForexQuotesAsync($interval, $ticker, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc')
    {
        return $this->getForexQuotesAsyncWithHttpInfo($interval, $ticker, $start_at, $end_at, $page, $page_size, $order)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getForexQuotesAsyncWithHttpInfo
     *
     * Time series
     *
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getForexQuotesAsyncWithHttpInfo($interval, $ticker, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc')
    {
        $returnType = '\Swagger\Client\Model\QuoteForexItem[]';
        $request = $this->getForexQuotesRequest($interval, $ticker, $start_at, $end_at, $page, $page_size, $order);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getForexQuotes'
     *
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getForexQuotesRequest($interval, $ticker, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc')
    {
        // verify the required parameter 'interval' is set
        if ($interval === null || (is_array($interval) && count($interval) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $interval when calling getForexQuotes'
            );
        }
        // verify the required parameter 'ticker' is set
        if ($ticker === null || (is_array($ticker) && count($ticker) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ticker when calling getForexQuotes'
            );
        }

        $resourcePath = '/forex/time_series';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($interval !== null) {
            $queryParams['interval'] = ObjectSerializer::toQueryValue($interval, null);
        }
        // query params
        if ($start_at !== null) {
            $queryParams['start_at'] = ObjectSerializer::toQueryValue($start_at, 'int64');
        }
        // query params
        if ($end_at !== null) {
            $queryParams['end_at'] = ObjectSerializer::toQueryValue($end_at, 'int64');
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page, 'int32');
        }
        // query params
        if ($page_size !== null) {
            $queryParams['page_size'] = ObjectSerializer::toQueryValue($page_size, 'int32');
        }
        // query params
        if ($order !== null) {
            $queryParams['order'] = ObjectSerializer::toQueryValue($order, null);
        }
        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getPriceBinance
     *
     * Price
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\PriceResponseBody
     */
    public function getPriceBinance($at = null, $ticker = null)
    {
        list($response) = $this->getPriceBinanceWithHttpInfo($at, $ticker);
        return $response;
    }

    /**
     * Operation getPriceBinanceWithHttpInfo
     *
     * Price
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\PriceResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPriceBinanceWithHttpInfo($at = null, $ticker = null)
    {
        $returnType = '\Swagger\Client\Model\PriceResponseBody';
        $request = $this->getPriceBinanceRequest($at, $ticker);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\PriceResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPriceBinanceAsync
     *
     * Price
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPriceBinanceAsync($at = null, $ticker = null)
    {
        return $this->getPriceBinanceAsyncWithHttpInfo($at, $ticker)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPriceBinanceAsyncWithHttpInfo
     *
     * Price
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPriceBinanceAsyncWithHttpInfo($at = null, $ticker = null)
    {
        $returnType = '\Swagger\Client\Model\PriceResponseBody';
        $request = $this->getPriceBinanceRequest($at, $ticker);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getPriceBinance'
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getPriceBinanceRequest($at = null, $ticker = null)
    {

        $resourcePath = '/binance/price';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($at !== null) {
            $queryParams['at'] = ObjectSerializer::toQueryValue($at, 'int64');
        }
        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getPriceCommon
     *
     * Price
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\PriceResponseBody
     */
    public function getPriceCommon($dataset, $at = null, $prepost = 'false', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $ticker = null)
    {
        list($response) = $this->getPriceCommonWithHttpInfo($dataset, $at, $prepost, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $ticker);
        return $response;
    }

    /**
     * Operation getPriceCommonWithHttpInfo
     *
     * Price
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\PriceResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPriceCommonWithHttpInfo($dataset, $at = null, $prepost = 'false', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $ticker = null)
    {
        $returnType = '\Swagger\Client\Model\PriceResponseBody';
        $request = $this->getPriceCommonRequest($dataset, $at, $prepost, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $ticker);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\PriceResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPriceCommonAsync
     *
     * Price
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPriceCommonAsync($dataset, $at = null, $prepost = 'false', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $ticker = null)
    {
        return $this->getPriceCommonAsyncWithHttpInfo($dataset, $at, $prepost, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $ticker)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPriceCommonAsyncWithHttpInfo
     *
     * Price
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPriceCommonAsyncWithHttpInfo($dataset, $at = null, $prepost = 'false', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $ticker = null)
    {
        $returnType = '\Swagger\Client\Model\PriceResponseBody';
        $request = $this->getPriceCommonRequest($dataset, $at, $prepost, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $ticker);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getPriceCommon'
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getPriceCommonRequest($dataset, $at = null, $prepost = 'false', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $ticker = null)
    {
        // verify the required parameter 'dataset' is set
        if ($dataset === null || (is_array($dataset) && count($dataset) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $dataset when calling getPriceCommon'
            );
        }

        $resourcePath = '/price';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($at !== null) {
            $queryParams['at'] = ObjectSerializer::toQueryValue($at, 'int64');
        }
        // query params
        if ($prepost !== null) {
            $queryParams['prepost'] = ObjectSerializer::toQueryValue($prepost, null);
        }
        // query params
        if ($cqs !== null) {
            $queryParams['cqs'] = ObjectSerializer::toQueryValue($cqs, null);
        }
        // query params
        if ($cik !== null) {
            $queryParams['cik'] = ObjectSerializer::toQueryValue($cik, null);
        }
        // query params
        if ($cusip !== null) {
            $queryParams['cusip'] = ObjectSerializer::toQueryValue($cusip, null);
        }
        // query params
        if ($isin !== null) {
            $queryParams['isin'] = ObjectSerializer::toQueryValue($isin, null);
        }
        // query params
        if ($composite_figi !== null) {
            $queryParams['composite_figi'] = ObjectSerializer::toQueryValue($composite_figi, null);
        }
        // query params
        if ($share_figi !== null) {
            $queryParams['share_figi'] = ObjectSerializer::toQueryValue($share_figi, null);
        }
        // query params
        if ($lei !== null) {
            $queryParams['lei'] = ObjectSerializer::toQueryValue($lei, null);
        }
        // query params
        if ($dataset !== null) {
            $queryParams['dataset'] = ObjectSerializer::toQueryValue($dataset, null);
        }
        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getPriceCrypto
     *
     * Price
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\PriceResponseBody
     */
    public function getPriceCrypto($at = null, $ticker = null)
    {
        list($response) = $this->getPriceCryptoWithHttpInfo($at, $ticker);
        return $response;
    }

    /**
     * Operation getPriceCryptoWithHttpInfo
     *
     * Price
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\PriceResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPriceCryptoWithHttpInfo($at = null, $ticker = null)
    {
        $returnType = '\Swagger\Client\Model\PriceResponseBody';
        $request = $this->getPriceCryptoRequest($at, $ticker);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\PriceResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPriceCryptoAsync
     *
     * Price
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPriceCryptoAsync($at = null, $ticker = null)
    {
        return $this->getPriceCryptoAsyncWithHttpInfo($at, $ticker)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPriceCryptoAsyncWithHttpInfo
     *
     * Price
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPriceCryptoAsyncWithHttpInfo($at = null, $ticker = null)
    {
        $returnType = '\Swagger\Client\Model\PriceResponseBody';
        $request = $this->getPriceCryptoRequest($at, $ticker);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getPriceCrypto'
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getPriceCryptoRequest($at = null, $ticker = null)
    {

        $resourcePath = '/crypto/price';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($at !== null) {
            $queryParams['at'] = ObjectSerializer::toQueryValue($at, 'int64');
        }
        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getPriceForex
     *
     * Forex price
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\PriceResponseBody
     */
    public function getPriceForex($at = null, $ticker = null)
    {
        list($response) = $this->getPriceForexWithHttpInfo($at, $ticker);
        return $response;
    }

    /**
     * Operation getPriceForexWithHttpInfo
     *
     * Forex price
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\PriceResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPriceForexWithHttpInfo($at = null, $ticker = null)
    {
        $returnType = '\Swagger\Client\Model\PriceResponseBody';
        $request = $this->getPriceForexRequest($at, $ticker);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\PriceResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPriceForexAsync
     *
     * Forex price
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPriceForexAsync($at = null, $ticker = null)
    {
        return $this->getPriceForexAsyncWithHttpInfo($at, $ticker)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPriceForexAsyncWithHttpInfo
     *
     * Forex price
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPriceForexAsyncWithHttpInfo($at = null, $ticker = null)
    {
        $returnType = '\Swagger\Client\Model\PriceResponseBody';
        $request = $this->getPriceForexRequest($at, $ticker);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getPriceForex'
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getPriceForexRequest($at = null, $ticker = null)
    {

        $resourcePath = '/forex/price';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($at !== null) {
            $queryParams['at'] = ObjectSerializer::toQueryValue($at, 'int64');
        }
        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getPriceSip
     *
     * Price
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\PriceResponseBody
     */
    public function getPriceSip($at = null, $prepost = 'false', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $ticker = null)
    {
        list($response) = $this->getPriceSipWithHttpInfo($at, $prepost, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $ticker);
        return $response;
    }

    /**
     * Operation getPriceSipWithHttpInfo
     *
     * Price
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\PriceResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPriceSipWithHttpInfo($at = null, $prepost = 'false', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $ticker = null)
    {
        $returnType = '\Swagger\Client\Model\PriceResponseBody';
        $request = $this->getPriceSipRequest($at, $prepost, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $ticker);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\PriceResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPriceSipAsync
     *
     * Price
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPriceSipAsync($at = null, $prepost = 'false', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $ticker = null)
    {
        return $this->getPriceSipAsyncWithHttpInfo($at, $prepost, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $ticker)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPriceSipAsyncWithHttpInfo
     *
     * Price
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPriceSipAsyncWithHttpInfo($at = null, $prepost = 'false', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $ticker = null)
    {
        $returnType = '\Swagger\Client\Model\PriceResponseBody';
        $request = $this->getPriceSipRequest($at, $prepost, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $ticker);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getPriceSip'
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getPriceSipRequest($at = null, $prepost = 'false', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $ticker = null)
    {

        $resourcePath = '/sip_non_pro/price';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($at !== null) {
            $queryParams['at'] = ObjectSerializer::toQueryValue($at, 'int64');
        }
        // query params
        if ($prepost !== null) {
            $queryParams['prepost'] = ObjectSerializer::toQueryValue($prepost, null);
        }
        // query params
        if ($cqs !== null) {
            $queryParams['cqs'] = ObjectSerializer::toQueryValue($cqs, null);
        }
        // query params
        if ($cik !== null) {
            $queryParams['cik'] = ObjectSerializer::toQueryValue($cik, null);
        }
        // query params
        if ($cusip !== null) {
            $queryParams['cusip'] = ObjectSerializer::toQueryValue($cusip, null);
        }
        // query params
        if ($isin !== null) {
            $queryParams['isin'] = ObjectSerializer::toQueryValue($isin, null);
        }
        // query params
        if ($composite_figi !== null) {
            $queryParams['composite_figi'] = ObjectSerializer::toQueryValue($composite_figi, null);
        }
        // query params
        if ($share_figi !== null) {
            $queryParams['share_figi'] = ObjectSerializer::toQueryValue($share_figi, null);
        }
        // query params
        if ($lei !== null) {
            $queryParams['lei'] = ObjectSerializer::toQueryValue($lei, null);
        }
        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getPriceSip_0
     *
     * Price
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\PriceResponseBody
     */
    public function getPriceSip_0($at = null, $prepost = 'false', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $ticker = null)
    {
        list($response) = $this->getPriceSip_0WithHttpInfo($at, $prepost, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $ticker);
        return $response;
    }

    /**
     * Operation getPriceSip_0WithHttpInfo
     *
     * Price
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\PriceResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPriceSip_0WithHttpInfo($at = null, $prepost = 'false', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $ticker = null)
    {
        $returnType = '\Swagger\Client\Model\PriceResponseBody';
        $request = $this->getPriceSip_0Request($at, $prepost, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $ticker);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\PriceResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPriceSip_0Async
     *
     * Price
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPriceSip_0Async($at = null, $prepost = 'false', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $ticker = null)
    {
        return $this->getPriceSip_0AsyncWithHttpInfo($at, $prepost, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $ticker)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPriceSip_0AsyncWithHttpInfo
     *
     * Price
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPriceSip_0AsyncWithHttpInfo($at = null, $prepost = 'false', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $ticker = null)
    {
        $returnType = '\Swagger\Client\Model\PriceResponseBody';
        $request = $this->getPriceSip_0Request($at, $prepost, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $ticker);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getPriceSip_0'
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getPriceSip_0Request($at = null, $prepost = 'false', $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $ticker = null)
    {

        $resourcePath = '/sip_pro/price';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($at !== null) {
            $queryParams['at'] = ObjectSerializer::toQueryValue($at, 'int64');
        }
        // query params
        if ($prepost !== null) {
            $queryParams['prepost'] = ObjectSerializer::toQueryValue($prepost, null);
        }
        // query params
        if ($cqs !== null) {
            $queryParams['cqs'] = ObjectSerializer::toQueryValue($cqs, null);
        }
        // query params
        if ($cik !== null) {
            $queryParams['cik'] = ObjectSerializer::toQueryValue($cik, null);
        }
        // query params
        if ($cusip !== null) {
            $queryParams['cusip'] = ObjectSerializer::toQueryValue($cusip, null);
        }
        // query params
        if ($isin !== null) {
            $queryParams['isin'] = ObjectSerializer::toQueryValue($isin, null);
        }
        // query params
        if ($composite_figi !== null) {
            $queryParams['composite_figi'] = ObjectSerializer::toQueryValue($composite_figi, null);
        }
        // query params
        if ($share_figi !== null) {
            $queryParams['share_figi'] = ObjectSerializer::toQueryValue($share_figi, null);
        }
        // query params
        if ($lei !== null) {
            $queryParams['lei'] = ObjectSerializer::toQueryValue($lei, null);
        }
        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getPriceUsStocks
     *
     * Price
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\PriceResponseBody
     */
    public function getPriceUsStocks($at = null, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $ticker = null)
    {
        list($response) = $this->getPriceUsStocksWithHttpInfo($at, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $ticker);
        return $response;
    }

    /**
     * Operation getPriceUsStocksWithHttpInfo
     *
     * Price
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\PriceResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPriceUsStocksWithHttpInfo($at = null, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $ticker = null)
    {
        $returnType = '\Swagger\Client\Model\PriceResponseBody';
        $request = $this->getPriceUsStocksRequest($at, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $ticker);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\PriceResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPriceUsStocksAsync
     *
     * Price
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPriceUsStocksAsync($at = null, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $ticker = null)
    {
        return $this->getPriceUsStocksAsyncWithHttpInfo($at, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $ticker)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPriceUsStocksAsyncWithHttpInfo
     *
     * Price
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPriceUsStocksAsyncWithHttpInfo($at = null, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $ticker = null)
    {
        $returnType = '\Swagger\Client\Model\PriceResponseBody';
        $request = $this->getPriceUsStocksRequest($at, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $ticker);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getPriceUsStocks'
     *
     * @param  int $at Filter by start time using a UNIX timestamp. If not specified - last price. Else - last price from 1min interval at the event_at &lt;&#x3D; at (optional)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getPriceUsStocksRequest($at = null, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $ticker = null)
    {

        $resourcePath = '/us_stocks_essential/price';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($at !== null) {
            $queryParams['at'] = ObjectSerializer::toQueryValue($at, 'int64');
        }
        // query params
        if ($cqs !== null) {
            $queryParams['cqs'] = ObjectSerializer::toQueryValue($cqs, null);
        }
        // query params
        if ($cik !== null) {
            $queryParams['cik'] = ObjectSerializer::toQueryValue($cik, null);
        }
        // query params
        if ($cusip !== null) {
            $queryParams['cusip'] = ObjectSerializer::toQueryValue($cusip, null);
        }
        // query params
        if ($isin !== null) {
            $queryParams['isin'] = ObjectSerializer::toQueryValue($isin, null);
        }
        // query params
        if ($composite_figi !== null) {
            $queryParams['composite_figi'] = ObjectSerializer::toQueryValue($composite_figi, null);
        }
        // query params
        if ($share_figi !== null) {
            $queryParams['share_figi'] = ObjectSerializer::toQueryValue($share_figi, null);
        }
        // query params
        if ($lei !== null) {
            $queryParams['lei'] = ObjectSerializer::toQueryValue($lei, null);
        }
        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getQuotes
     *
     * Time series
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\QuoteItem[]
     */
    public function getQuotes($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all')
    {
        list($response) = $this->getQuotesWithHttpInfo($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust);
        return $response;
    }

    /**
     * Operation getQuotesWithHttpInfo
     *
     * Time series
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\QuoteItem[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getQuotesWithHttpInfo($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all')
    {
        $returnType = '\Swagger\Client\Model\QuoteItem[]';
        $request = $this->getQuotesRequest($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\QuoteItem[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getQuotesAsync
     *
     * Time series
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getQuotesAsync($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all')
    {
        return $this->getQuotesAsyncWithHttpInfo($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getQuotesAsyncWithHttpInfo
     *
     * Time series
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getQuotesAsyncWithHttpInfo($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all')
    {
        $returnType = '\Swagger\Client\Model\QuoteItem[]';
        $request = $this->getQuotesRequest($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getQuotes'
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getQuotesRequest($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all')
    {
        // verify the required parameter 'dataset' is set
        if ($dataset === null || (is_array($dataset) && count($dataset) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $dataset when calling getQuotes'
            );
        }
        // verify the required parameter 'ticker' is set
        if ($ticker === null || (is_array($ticker) && count($ticker) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ticker when calling getQuotes'
            );
        }
        // verify the required parameter 'interval' is set
        if ($interval === null || (is_array($interval) && count($interval) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $interval when calling getQuotes'
            );
        }

        $resourcePath = '/time_series';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($cqs !== null) {
            $queryParams['cqs'] = ObjectSerializer::toQueryValue($cqs, null);
        }
        // query params
        if ($cik !== null) {
            $queryParams['cik'] = ObjectSerializer::toQueryValue($cik, null);
        }
        // query params
        if ($cusip !== null) {
            $queryParams['cusip'] = ObjectSerializer::toQueryValue($cusip, null);
        }
        // query params
        if ($isin !== null) {
            $queryParams['isin'] = ObjectSerializer::toQueryValue($isin, null);
        }
        // query params
        if ($composite_figi !== null) {
            $queryParams['composite_figi'] = ObjectSerializer::toQueryValue($composite_figi, null);
        }
        // query params
        if ($share_figi !== null) {
            $queryParams['share_figi'] = ObjectSerializer::toQueryValue($share_figi, null);
        }
        // query params
        if ($lei !== null) {
            $queryParams['lei'] = ObjectSerializer::toQueryValue($lei, null);
        }
        // query params
        if ($dataset !== null) {
            $queryParams['dataset'] = ObjectSerializer::toQueryValue($dataset, null);
        }
        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }
        // query params
        if ($interval !== null) {
            $queryParams['interval'] = ObjectSerializer::toQueryValue($interval, null);
        }
        // query params
        if ($market !== null) {
            $queryParams['market'] = ObjectSerializer::toQueryValue($market, null);
        }
        // query params
        if ($country !== null) {
            $queryParams['country'] = ObjectSerializer::toQueryValue($country, null);
        }
        // query params
        if ($start_at !== null) {
            $queryParams['start_at'] = ObjectSerializer::toQueryValue($start_at, 'int64');
        }
        // query params
        if ($end_at !== null) {
            $queryParams['end_at'] = ObjectSerializer::toQueryValue($end_at, 'int64');
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page, 'int32');
        }
        // query params
        if ($page_size !== null) {
            $queryParams['page_size'] = ObjectSerializer::toQueryValue($page_size, 'int32');
        }
        // query params
        if ($order !== null) {
            $queryParams['order'] = ObjectSerializer::toQueryValue($order, null);
        }
        // query params
        if ($prepost !== null) {
            $queryParams['prepost'] = ObjectSerializer::toQueryValue($prepost, null);
        }
        // query params
        if ($adjust !== null) {
            $queryParams['adjust'] = ObjectSerializer::toQueryValue($adjust, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getSipTrades
     *
     * SIP trades
     *
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market center (optional)
     * @param  int $start_at Filter trades by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter trades by end time using a UNIX timestamp (optional)
     * @param  string $tape Filter by tape (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 10)
     * @param  string $order Sorting order of the output series (optional, default to DESC)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\SipTradesItem[]
     */
    public function getSipTrades($ticker, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $start_at = null, $end_at = null, $tape = null, $page = '0', $page_size = '10', $order = 'DESC')
    {
        list($response) = $this->getSipTradesWithHttpInfo($ticker, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $start_at, $end_at, $tape, $page, $page_size, $order);
        return $response;
    }

    /**
     * Operation getSipTradesWithHttpInfo
     *
     * SIP trades
     *
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market center (optional)
     * @param  int $start_at Filter trades by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter trades by end time using a UNIX timestamp (optional)
     * @param  string $tape Filter by tape (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 10)
     * @param  string $order Sorting order of the output series (optional, default to DESC)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\SipTradesItem[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getSipTradesWithHttpInfo($ticker, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $start_at = null, $end_at = null, $tape = null, $page = '0', $page_size = '10', $order = 'DESC')
    {
        $returnType = '\Swagger\Client\Model\SipTradesItem[]';
        $request = $this->getSipTradesRequest($ticker, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $start_at, $end_at, $tape, $page, $page_size, $order);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\SipTradesItem[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getSipTradesAsync
     *
     * SIP trades
     *
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market center (optional)
     * @param  int $start_at Filter trades by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter trades by end time using a UNIX timestamp (optional)
     * @param  string $tape Filter by tape (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 10)
     * @param  string $order Sorting order of the output series (optional, default to DESC)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSipTradesAsync($ticker, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $start_at = null, $end_at = null, $tape = null, $page = '0', $page_size = '10', $order = 'DESC')
    {
        return $this->getSipTradesAsyncWithHttpInfo($ticker, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $start_at, $end_at, $tape, $page, $page_size, $order)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getSipTradesAsyncWithHttpInfo
     *
     * SIP trades
     *
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market center (optional)
     * @param  int $start_at Filter trades by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter trades by end time using a UNIX timestamp (optional)
     * @param  string $tape Filter by tape (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 10)
     * @param  string $order Sorting order of the output series (optional, default to DESC)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSipTradesAsyncWithHttpInfo($ticker, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $start_at = null, $end_at = null, $tape = null, $page = '0', $page_size = '10', $order = 'DESC')
    {
        $returnType = '\Swagger\Client\Model\SipTradesItem[]';
        $request = $this->getSipTradesRequest($ticker, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $start_at, $end_at, $tape, $page, $page_size, $order);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getSipTrades'
     *
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market center (optional)
     * @param  int $start_at Filter trades by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter trades by end time using a UNIX timestamp (optional)
     * @param  string $tape Filter by tape (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 10)
     * @param  string $order Sorting order of the output series (optional, default to DESC)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getSipTradesRequest($ticker, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $start_at = null, $end_at = null, $tape = null, $page = '0', $page_size = '10', $order = 'DESC')
    {
        // verify the required parameter 'ticker' is set
        if ($ticker === null || (is_array($ticker) && count($ticker) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ticker when calling getSipTrades'
            );
        }

        $resourcePath = '/sip/trades';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($cqs !== null) {
            $queryParams['cqs'] = ObjectSerializer::toQueryValue($cqs, null);
        }
        // query params
        if ($cik !== null) {
            $queryParams['cik'] = ObjectSerializer::toQueryValue($cik, null);
        }
        // query params
        if ($cusip !== null) {
            $queryParams['cusip'] = ObjectSerializer::toQueryValue($cusip, null);
        }
        // query params
        if ($isin !== null) {
            $queryParams['isin'] = ObjectSerializer::toQueryValue($isin, null);
        }
        // query params
        if ($composite_figi !== null) {
            $queryParams['composite_figi'] = ObjectSerializer::toQueryValue($composite_figi, null);
        }
        // query params
        if ($share_figi !== null) {
            $queryParams['share_figi'] = ObjectSerializer::toQueryValue($share_figi, null);
        }
        // query params
        if ($lei !== null) {
            $queryParams['lei'] = ObjectSerializer::toQueryValue($lei, null);
        }
        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }
        // query params
        if ($market !== null) {
            $queryParams['market'] = ObjectSerializer::toQueryValue($market, null);
        }
        // query params
        if ($start_at !== null) {
            $queryParams['start_at'] = ObjectSerializer::toQueryValue($start_at, 'int64');
        }
        // query params
        if ($end_at !== null) {
            $queryParams['end_at'] = ObjectSerializer::toQueryValue($end_at, 'int64');
        }
        // query params
        if ($tape !== null) {
            $queryParams['tape'] = ObjectSerializer::toQueryValue($tape, null);
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page, 'int64');
        }
        // query params
        if ($page_size !== null) {
            $queryParams['page_size'] = ObjectSerializer::toQueryValue($page_size, 'int64');
        }
        // query params
        if ($order !== null) {
            $queryParams['order'] = ObjectSerializer::toQueryValue($order, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getTechnicalIndicatorAtr
     *
     * ATR Technical indicators
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  int $time_period Number of periods to average over. (optional, default to 14)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\TechnicalIndicatorResponseAtr[]
     */
    public function getTechnicalIndicatorAtr($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $time_period = '14')
    {
        list($response) = $this->getTechnicalIndicatorAtrWithHttpInfo($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $time_period);
        return $response;
    }

    /**
     * Operation getTechnicalIndicatorAtrWithHttpInfo
     *
     * ATR Technical indicators
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  int $time_period Number of periods to average over. (optional, default to 14)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\TechnicalIndicatorResponseAtr[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getTechnicalIndicatorAtrWithHttpInfo($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $time_period = '14')
    {
        $returnType = '\Swagger\Client\Model\TechnicalIndicatorResponseAtr[]';
        $request = $this->getTechnicalIndicatorAtrRequest($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $time_period);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\TechnicalIndicatorResponseAtr[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getTechnicalIndicatorAtrAsync
     *
     * ATR Technical indicators
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  int $time_period Number of periods to average over. (optional, default to 14)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTechnicalIndicatorAtrAsync($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $time_period = '14')
    {
        return $this->getTechnicalIndicatorAtrAsyncWithHttpInfo($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $time_period)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getTechnicalIndicatorAtrAsyncWithHttpInfo
     *
     * ATR Technical indicators
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  int $time_period Number of periods to average over. (optional, default to 14)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTechnicalIndicatorAtrAsyncWithHttpInfo($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $time_period = '14')
    {
        $returnType = '\Swagger\Client\Model\TechnicalIndicatorResponseAtr[]';
        $request = $this->getTechnicalIndicatorAtrRequest($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $time_period);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getTechnicalIndicatorAtr'
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  int $time_period Number of periods to average over. (optional, default to 14)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getTechnicalIndicatorAtrRequest($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $time_period = '14')
    {
        // verify the required parameter 'dataset' is set
        if ($dataset === null || (is_array($dataset) && count($dataset) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $dataset when calling getTechnicalIndicatorAtr'
            );
        }
        // verify the required parameter 'ticker' is set
        if ($ticker === null || (is_array($ticker) && count($ticker) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ticker when calling getTechnicalIndicatorAtr'
            );
        }
        // verify the required parameter 'interval' is set
        if ($interval === null || (is_array($interval) && count($interval) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $interval when calling getTechnicalIndicatorAtr'
            );
        }

        $resourcePath = '/time_series/atr';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($cqs !== null) {
            $queryParams['cqs'] = ObjectSerializer::toQueryValue($cqs, null);
        }
        // query params
        if ($cik !== null) {
            $queryParams['cik'] = ObjectSerializer::toQueryValue($cik, null);
        }
        // query params
        if ($cusip !== null) {
            $queryParams['cusip'] = ObjectSerializer::toQueryValue($cusip, null);
        }
        // query params
        if ($isin !== null) {
            $queryParams['isin'] = ObjectSerializer::toQueryValue($isin, null);
        }
        // query params
        if ($composite_figi !== null) {
            $queryParams['composite_figi'] = ObjectSerializer::toQueryValue($composite_figi, null);
        }
        // query params
        if ($share_figi !== null) {
            $queryParams['share_figi'] = ObjectSerializer::toQueryValue($share_figi, null);
        }
        // query params
        if ($lei !== null) {
            $queryParams['lei'] = ObjectSerializer::toQueryValue($lei, null);
        }
        // query params
        if ($dataset !== null) {
            $queryParams['dataset'] = ObjectSerializer::toQueryValue($dataset, null);
        }
        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }
        // query params
        if ($interval !== null) {
            $queryParams['interval'] = ObjectSerializer::toQueryValue($interval, null);
        }
        // query params
        if ($market !== null) {
            $queryParams['market'] = ObjectSerializer::toQueryValue($market, null);
        }
        // query params
        if ($country !== null) {
            $queryParams['country'] = ObjectSerializer::toQueryValue($country, null);
        }
        // query params
        if ($start_at !== null) {
            $queryParams['start_at'] = ObjectSerializer::toQueryValue($start_at, 'int64');
        }
        // query params
        if ($end_at !== null) {
            $queryParams['end_at'] = ObjectSerializer::toQueryValue($end_at, 'int64');
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page, 'int32');
        }
        // query params
        if ($page_size !== null) {
            $queryParams['page_size'] = ObjectSerializer::toQueryValue($page_size, 'int32');
        }
        // query params
        if ($order !== null) {
            $queryParams['order'] = ObjectSerializer::toQueryValue($order, null);
        }
        // query params
        if ($prepost !== null) {
            $queryParams['prepost'] = ObjectSerializer::toQueryValue($prepost, null);
        }
        // query params
        if ($adjust !== null) {
            $queryParams['adjust'] = ObjectSerializer::toQueryValue($adjust, null);
        }
        // query params
        if ($time_period !== null) {
            $queryParams['time_period'] = ObjectSerializer::toQueryValue($time_period, 'int64');
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getTechnicalIndicatorBBands
     *
     * Overlap Studies
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  string $series_type Specifies the price data type on which technical indicator is calculated (optional, default to close)
     * @param  int $time_period Number of periods to average over. (optional, default to 20)
     * @param  double $sd Number of standard deviations (optional, default to 2.0)
     * @param  string $ma_type The type of moving average used, such as SMA or EMA (optional, default to SMA)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\TechnicalIndicatorResponseBBands[]
     */
    public function getTechnicalIndicatorBBands($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $series_type = 'close', $time_period = '20', $sd = '2.0', $ma_type = 'SMA')
    {
        list($response) = $this->getTechnicalIndicatorBBandsWithHttpInfo($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type, $time_period, $sd, $ma_type);
        return $response;
    }

    /**
     * Operation getTechnicalIndicatorBBandsWithHttpInfo
     *
     * Overlap Studies
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  string $series_type Specifies the price data type on which technical indicator is calculated (optional, default to close)
     * @param  int $time_period Number of periods to average over. (optional, default to 20)
     * @param  double $sd Number of standard deviations (optional, default to 2.0)
     * @param  string $ma_type The type of moving average used, such as SMA or EMA (optional, default to SMA)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\TechnicalIndicatorResponseBBands[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getTechnicalIndicatorBBandsWithHttpInfo($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $series_type = 'close', $time_period = '20', $sd = '2.0', $ma_type = 'SMA')
    {
        $returnType = '\Swagger\Client\Model\TechnicalIndicatorResponseBBands[]';
        $request = $this->getTechnicalIndicatorBBandsRequest($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type, $time_period, $sd, $ma_type);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\TechnicalIndicatorResponseBBands[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getTechnicalIndicatorBBandsAsync
     *
     * Overlap Studies
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  string $series_type Specifies the price data type on which technical indicator is calculated (optional, default to close)
     * @param  int $time_period Number of periods to average over. (optional, default to 20)
     * @param  double $sd Number of standard deviations (optional, default to 2.0)
     * @param  string $ma_type The type of moving average used, such as SMA or EMA (optional, default to SMA)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTechnicalIndicatorBBandsAsync($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $series_type = 'close', $time_period = '20', $sd = '2.0', $ma_type = 'SMA')
    {
        return $this->getTechnicalIndicatorBBandsAsyncWithHttpInfo($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type, $time_period, $sd, $ma_type)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getTechnicalIndicatorBBandsAsyncWithHttpInfo
     *
     * Overlap Studies
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  string $series_type Specifies the price data type on which technical indicator is calculated (optional, default to close)
     * @param  int $time_period Number of periods to average over. (optional, default to 20)
     * @param  double $sd Number of standard deviations (optional, default to 2.0)
     * @param  string $ma_type The type of moving average used, such as SMA or EMA (optional, default to SMA)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTechnicalIndicatorBBandsAsyncWithHttpInfo($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $series_type = 'close', $time_period = '20', $sd = '2.0', $ma_type = 'SMA')
    {
        $returnType = '\Swagger\Client\Model\TechnicalIndicatorResponseBBands[]';
        $request = $this->getTechnicalIndicatorBBandsRequest($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type, $time_period, $sd, $ma_type);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getTechnicalIndicatorBBands'
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  string $series_type Specifies the price data type on which technical indicator is calculated (optional, default to close)
     * @param  int $time_period Number of periods to average over. (optional, default to 20)
     * @param  double $sd Number of standard deviations (optional, default to 2.0)
     * @param  string $ma_type The type of moving average used, such as SMA or EMA (optional, default to SMA)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getTechnicalIndicatorBBandsRequest($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $series_type = 'close', $time_period = '20', $sd = '2.0', $ma_type = 'SMA')
    {
        // verify the required parameter 'dataset' is set
        if ($dataset === null || (is_array($dataset) && count($dataset) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $dataset when calling getTechnicalIndicatorBBands'
            );
        }
        // verify the required parameter 'ticker' is set
        if ($ticker === null || (is_array($ticker) && count($ticker) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ticker when calling getTechnicalIndicatorBBands'
            );
        }
        // verify the required parameter 'interval' is set
        if ($interval === null || (is_array($interval) && count($interval) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $interval when calling getTechnicalIndicatorBBands'
            );
        }

        $resourcePath = '/time_series/bbands';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($cqs !== null) {
            $queryParams['cqs'] = ObjectSerializer::toQueryValue($cqs, null);
        }
        // query params
        if ($cik !== null) {
            $queryParams['cik'] = ObjectSerializer::toQueryValue($cik, null);
        }
        // query params
        if ($cusip !== null) {
            $queryParams['cusip'] = ObjectSerializer::toQueryValue($cusip, null);
        }
        // query params
        if ($isin !== null) {
            $queryParams['isin'] = ObjectSerializer::toQueryValue($isin, null);
        }
        // query params
        if ($composite_figi !== null) {
            $queryParams['composite_figi'] = ObjectSerializer::toQueryValue($composite_figi, null);
        }
        // query params
        if ($share_figi !== null) {
            $queryParams['share_figi'] = ObjectSerializer::toQueryValue($share_figi, null);
        }
        // query params
        if ($lei !== null) {
            $queryParams['lei'] = ObjectSerializer::toQueryValue($lei, null);
        }
        // query params
        if ($dataset !== null) {
            $queryParams['dataset'] = ObjectSerializer::toQueryValue($dataset, null);
        }
        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }
        // query params
        if ($interval !== null) {
            $queryParams['interval'] = ObjectSerializer::toQueryValue($interval, null);
        }
        // query params
        if ($market !== null) {
            $queryParams['market'] = ObjectSerializer::toQueryValue($market, null);
        }
        // query params
        if ($country !== null) {
            $queryParams['country'] = ObjectSerializer::toQueryValue($country, null);
        }
        // query params
        if ($start_at !== null) {
            $queryParams['start_at'] = ObjectSerializer::toQueryValue($start_at, 'int64');
        }
        // query params
        if ($end_at !== null) {
            $queryParams['end_at'] = ObjectSerializer::toQueryValue($end_at, 'int64');
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page, 'int32');
        }
        // query params
        if ($page_size !== null) {
            $queryParams['page_size'] = ObjectSerializer::toQueryValue($page_size, 'int32');
        }
        // query params
        if ($order !== null) {
            $queryParams['order'] = ObjectSerializer::toQueryValue($order, null);
        }
        // query params
        if ($prepost !== null) {
            $queryParams['prepost'] = ObjectSerializer::toQueryValue($prepost, null);
        }
        // query params
        if ($adjust !== null) {
            $queryParams['adjust'] = ObjectSerializer::toQueryValue($adjust, null);
        }
        // query params
        if ($series_type !== null) {
            $queryParams['series_type'] = ObjectSerializer::toQueryValue($series_type, null);
        }
        // query params
        if ($time_period !== null) {
            $queryParams['time_period'] = ObjectSerializer::toQueryValue($time_period, 'int64');
        }
        // query params
        if ($sd !== null) {
            $queryParams['sd'] = ObjectSerializer::toQueryValue($sd, 'double');
        }
        // query params
        if ($ma_type !== null) {
            $queryParams['ma_type'] = ObjectSerializer::toQueryValue($ma_type, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getTechnicalIndicatorIchimoku
     *
     * Overlap Studies
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  int $conversion_line_period The time period used for generating the conversation line (optional, default to 9)
     * @param  int $base_line_period The time period used for generating the base line (optional, default to 26)
     * @param  int $leading_span_b_period The time period used for generating the leading span B line (optional, default to 52)
     * @param  int $lagging_span_period The time period used for generating the lagging span line (optional, default to 26)
     * @param  bool $include_ahead_span_period Indicates whether to include ahead span period (optional, default to true)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\TechnicalIndicatorResponseIchimoku[]
     */
    public function getTechnicalIndicatorIchimoku($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $conversion_line_period = '9', $base_line_period = '26', $leading_span_b_period = '52', $lagging_span_period = '26', $include_ahead_span_period = 'true')
    {
        list($response) = $this->getTechnicalIndicatorIchimokuWithHttpInfo($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $conversion_line_period, $base_line_period, $leading_span_b_period, $lagging_span_period, $include_ahead_span_period);
        return $response;
    }

    /**
     * Operation getTechnicalIndicatorIchimokuWithHttpInfo
     *
     * Overlap Studies
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  int $conversion_line_period The time period used for generating the conversation line (optional, default to 9)
     * @param  int $base_line_period The time period used for generating the base line (optional, default to 26)
     * @param  int $leading_span_b_period The time period used for generating the leading span B line (optional, default to 52)
     * @param  int $lagging_span_period The time period used for generating the lagging span line (optional, default to 26)
     * @param  bool $include_ahead_span_period Indicates whether to include ahead span period (optional, default to true)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\TechnicalIndicatorResponseIchimoku[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getTechnicalIndicatorIchimokuWithHttpInfo($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $conversion_line_period = '9', $base_line_period = '26', $leading_span_b_period = '52', $lagging_span_period = '26', $include_ahead_span_period = 'true')
    {
        $returnType = '\Swagger\Client\Model\TechnicalIndicatorResponseIchimoku[]';
        $request = $this->getTechnicalIndicatorIchimokuRequest($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $conversion_line_period, $base_line_period, $leading_span_b_period, $lagging_span_period, $include_ahead_span_period);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\TechnicalIndicatorResponseIchimoku[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getTechnicalIndicatorIchimokuAsync
     *
     * Overlap Studies
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  int $conversion_line_period The time period used for generating the conversation line (optional, default to 9)
     * @param  int $base_line_period The time period used for generating the base line (optional, default to 26)
     * @param  int $leading_span_b_period The time period used for generating the leading span B line (optional, default to 52)
     * @param  int $lagging_span_period The time period used for generating the lagging span line (optional, default to 26)
     * @param  bool $include_ahead_span_period Indicates whether to include ahead span period (optional, default to true)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTechnicalIndicatorIchimokuAsync($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $conversion_line_period = '9', $base_line_period = '26', $leading_span_b_period = '52', $lagging_span_period = '26', $include_ahead_span_period = 'true')
    {
        return $this->getTechnicalIndicatorIchimokuAsyncWithHttpInfo($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $conversion_line_period, $base_line_period, $leading_span_b_period, $lagging_span_period, $include_ahead_span_period)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getTechnicalIndicatorIchimokuAsyncWithHttpInfo
     *
     * Overlap Studies
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  int $conversion_line_period The time period used for generating the conversation line (optional, default to 9)
     * @param  int $base_line_period The time period used for generating the base line (optional, default to 26)
     * @param  int $leading_span_b_period The time period used for generating the leading span B line (optional, default to 52)
     * @param  int $lagging_span_period The time period used for generating the lagging span line (optional, default to 26)
     * @param  bool $include_ahead_span_period Indicates whether to include ahead span period (optional, default to true)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTechnicalIndicatorIchimokuAsyncWithHttpInfo($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $conversion_line_period = '9', $base_line_period = '26', $leading_span_b_period = '52', $lagging_span_period = '26', $include_ahead_span_period = 'true')
    {
        $returnType = '\Swagger\Client\Model\TechnicalIndicatorResponseIchimoku[]';
        $request = $this->getTechnicalIndicatorIchimokuRequest($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $conversion_line_period, $base_line_period, $leading_span_b_period, $lagging_span_period, $include_ahead_span_period);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getTechnicalIndicatorIchimoku'
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  int $conversion_line_period The time period used for generating the conversation line (optional, default to 9)
     * @param  int $base_line_period The time period used for generating the base line (optional, default to 26)
     * @param  int $leading_span_b_period The time period used for generating the leading span B line (optional, default to 52)
     * @param  int $lagging_span_period The time period used for generating the lagging span line (optional, default to 26)
     * @param  bool $include_ahead_span_period Indicates whether to include ahead span period (optional, default to true)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getTechnicalIndicatorIchimokuRequest($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $conversion_line_period = '9', $base_line_period = '26', $leading_span_b_period = '52', $lagging_span_period = '26', $include_ahead_span_period = 'true')
    {
        // verify the required parameter 'dataset' is set
        if ($dataset === null || (is_array($dataset) && count($dataset) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $dataset when calling getTechnicalIndicatorIchimoku'
            );
        }
        // verify the required parameter 'ticker' is set
        if ($ticker === null || (is_array($ticker) && count($ticker) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ticker when calling getTechnicalIndicatorIchimoku'
            );
        }
        // verify the required parameter 'interval' is set
        if ($interval === null || (is_array($interval) && count($interval) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $interval when calling getTechnicalIndicatorIchimoku'
            );
        }

        $resourcePath = '/time_series/ichimoku';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($cqs !== null) {
            $queryParams['cqs'] = ObjectSerializer::toQueryValue($cqs, null);
        }
        // query params
        if ($cik !== null) {
            $queryParams['cik'] = ObjectSerializer::toQueryValue($cik, null);
        }
        // query params
        if ($cusip !== null) {
            $queryParams['cusip'] = ObjectSerializer::toQueryValue($cusip, null);
        }
        // query params
        if ($isin !== null) {
            $queryParams['isin'] = ObjectSerializer::toQueryValue($isin, null);
        }
        // query params
        if ($composite_figi !== null) {
            $queryParams['composite_figi'] = ObjectSerializer::toQueryValue($composite_figi, null);
        }
        // query params
        if ($share_figi !== null) {
            $queryParams['share_figi'] = ObjectSerializer::toQueryValue($share_figi, null);
        }
        // query params
        if ($lei !== null) {
            $queryParams['lei'] = ObjectSerializer::toQueryValue($lei, null);
        }
        // query params
        if ($dataset !== null) {
            $queryParams['dataset'] = ObjectSerializer::toQueryValue($dataset, null);
        }
        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }
        // query params
        if ($interval !== null) {
            $queryParams['interval'] = ObjectSerializer::toQueryValue($interval, null);
        }
        // query params
        if ($market !== null) {
            $queryParams['market'] = ObjectSerializer::toQueryValue($market, null);
        }
        // query params
        if ($country !== null) {
            $queryParams['country'] = ObjectSerializer::toQueryValue($country, null);
        }
        // query params
        if ($start_at !== null) {
            $queryParams['start_at'] = ObjectSerializer::toQueryValue($start_at, 'int64');
        }
        // query params
        if ($end_at !== null) {
            $queryParams['end_at'] = ObjectSerializer::toQueryValue($end_at, 'int64');
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page, 'int32');
        }
        // query params
        if ($page_size !== null) {
            $queryParams['page_size'] = ObjectSerializer::toQueryValue($page_size, 'int32');
        }
        // query params
        if ($order !== null) {
            $queryParams['order'] = ObjectSerializer::toQueryValue($order, null);
        }
        // query params
        if ($prepost !== null) {
            $queryParams['prepost'] = ObjectSerializer::toQueryValue($prepost, null);
        }
        // query params
        if ($adjust !== null) {
            $queryParams['adjust'] = ObjectSerializer::toQueryValue($adjust, null);
        }
        // query params
        if ($conversion_line_period !== null) {
            $queryParams['conversion_line_period'] = ObjectSerializer::toQueryValue($conversion_line_period, 'int64');
        }
        // query params
        if ($base_line_period !== null) {
            $queryParams['base_line_period'] = ObjectSerializer::toQueryValue($base_line_period, 'int64');
        }
        // query params
        if ($leading_span_b_period !== null) {
            $queryParams['leading_span_b_period'] = ObjectSerializer::toQueryValue($leading_span_b_period, 'int64');
        }
        // query params
        if ($lagging_span_period !== null) {
            $queryParams['lagging_span_period'] = ObjectSerializer::toQueryValue($lagging_span_period, 'int64');
        }
        // query params
        if ($include_ahead_span_period !== null) {
            $queryParams['include_ahead_span_period'] = ObjectSerializer::toQueryValue($include_ahead_span_period, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getTechnicalIndicatorMa
     *
     * Overlap Studies
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  string $series_type Specifies the price data type on which technical indicator is calculated (optional, default to close)
     * @param  int $time_period Number of periods to average over. (optional, default to 9)
     * @param  string $ma_type The type of moving average used, such as SMA or EMA (optional, default to SMA)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\TechnicalIndicatorResponseMa[]
     */
    public function getTechnicalIndicatorMa($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $series_type = 'close', $time_period = '9', $ma_type = 'SMA')
    {
        list($response) = $this->getTechnicalIndicatorMaWithHttpInfo($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type, $time_period, $ma_type);
        return $response;
    }

    /**
     * Operation getTechnicalIndicatorMaWithHttpInfo
     *
     * Overlap Studies
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  string $series_type Specifies the price data type on which technical indicator is calculated (optional, default to close)
     * @param  int $time_period Number of periods to average over. (optional, default to 9)
     * @param  string $ma_type The type of moving average used, such as SMA or EMA (optional, default to SMA)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\TechnicalIndicatorResponseMa[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getTechnicalIndicatorMaWithHttpInfo($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $series_type = 'close', $time_period = '9', $ma_type = 'SMA')
    {
        $returnType = '\Swagger\Client\Model\TechnicalIndicatorResponseMa[]';
        $request = $this->getTechnicalIndicatorMaRequest($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type, $time_period, $ma_type);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\TechnicalIndicatorResponseMa[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getTechnicalIndicatorMaAsync
     *
     * Overlap Studies
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  string $series_type Specifies the price data type on which technical indicator is calculated (optional, default to close)
     * @param  int $time_period Number of periods to average over. (optional, default to 9)
     * @param  string $ma_type The type of moving average used, such as SMA or EMA (optional, default to SMA)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTechnicalIndicatorMaAsync($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $series_type = 'close', $time_period = '9', $ma_type = 'SMA')
    {
        return $this->getTechnicalIndicatorMaAsyncWithHttpInfo($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type, $time_period, $ma_type)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getTechnicalIndicatorMaAsyncWithHttpInfo
     *
     * Overlap Studies
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  string $series_type Specifies the price data type on which technical indicator is calculated (optional, default to close)
     * @param  int $time_period Number of periods to average over. (optional, default to 9)
     * @param  string $ma_type The type of moving average used, such as SMA or EMA (optional, default to SMA)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTechnicalIndicatorMaAsyncWithHttpInfo($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $series_type = 'close', $time_period = '9', $ma_type = 'SMA')
    {
        $returnType = '\Swagger\Client\Model\TechnicalIndicatorResponseMa[]';
        $request = $this->getTechnicalIndicatorMaRequest($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type, $time_period, $ma_type);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getTechnicalIndicatorMa'
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  string $series_type Specifies the price data type on which technical indicator is calculated (optional, default to close)
     * @param  int $time_period Number of periods to average over. (optional, default to 9)
     * @param  string $ma_type The type of moving average used, such as SMA or EMA (optional, default to SMA)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getTechnicalIndicatorMaRequest($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $series_type = 'close', $time_period = '9', $ma_type = 'SMA')
    {
        // verify the required parameter 'dataset' is set
        if ($dataset === null || (is_array($dataset) && count($dataset) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $dataset when calling getTechnicalIndicatorMa'
            );
        }
        // verify the required parameter 'ticker' is set
        if ($ticker === null || (is_array($ticker) && count($ticker) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ticker when calling getTechnicalIndicatorMa'
            );
        }
        // verify the required parameter 'interval' is set
        if ($interval === null || (is_array($interval) && count($interval) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $interval when calling getTechnicalIndicatorMa'
            );
        }

        $resourcePath = '/time_series/ma';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($cqs !== null) {
            $queryParams['cqs'] = ObjectSerializer::toQueryValue($cqs, null);
        }
        // query params
        if ($cik !== null) {
            $queryParams['cik'] = ObjectSerializer::toQueryValue($cik, null);
        }
        // query params
        if ($cusip !== null) {
            $queryParams['cusip'] = ObjectSerializer::toQueryValue($cusip, null);
        }
        // query params
        if ($isin !== null) {
            $queryParams['isin'] = ObjectSerializer::toQueryValue($isin, null);
        }
        // query params
        if ($composite_figi !== null) {
            $queryParams['composite_figi'] = ObjectSerializer::toQueryValue($composite_figi, null);
        }
        // query params
        if ($share_figi !== null) {
            $queryParams['share_figi'] = ObjectSerializer::toQueryValue($share_figi, null);
        }
        // query params
        if ($lei !== null) {
            $queryParams['lei'] = ObjectSerializer::toQueryValue($lei, null);
        }
        // query params
        if ($dataset !== null) {
            $queryParams['dataset'] = ObjectSerializer::toQueryValue($dataset, null);
        }
        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }
        // query params
        if ($interval !== null) {
            $queryParams['interval'] = ObjectSerializer::toQueryValue($interval, null);
        }
        // query params
        if ($market !== null) {
            $queryParams['market'] = ObjectSerializer::toQueryValue($market, null);
        }
        // query params
        if ($country !== null) {
            $queryParams['country'] = ObjectSerializer::toQueryValue($country, null);
        }
        // query params
        if ($start_at !== null) {
            $queryParams['start_at'] = ObjectSerializer::toQueryValue($start_at, 'int64');
        }
        // query params
        if ($end_at !== null) {
            $queryParams['end_at'] = ObjectSerializer::toQueryValue($end_at, 'int64');
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page, 'int32');
        }
        // query params
        if ($page_size !== null) {
            $queryParams['page_size'] = ObjectSerializer::toQueryValue($page_size, 'int32');
        }
        // query params
        if ($order !== null) {
            $queryParams['order'] = ObjectSerializer::toQueryValue($order, null);
        }
        // query params
        if ($prepost !== null) {
            $queryParams['prepost'] = ObjectSerializer::toQueryValue($prepost, null);
        }
        // query params
        if ($adjust !== null) {
            $queryParams['adjust'] = ObjectSerializer::toQueryValue($adjust, null);
        }
        // query params
        if ($series_type !== null) {
            $queryParams['series_type'] = ObjectSerializer::toQueryValue($series_type, null);
        }
        // query params
        if ($time_period !== null) {
            $queryParams['time_period'] = ObjectSerializer::toQueryValue($time_period, 'int64');
        }
        // query params
        if ($ma_type !== null) {
            $queryParams['ma_type'] = ObjectSerializer::toQueryValue($ma_type, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getTechnicalIndicatorMacd
     *
     * Momentum Indicators
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  string $series_type Specifies the price data type on which technical indicator is calculated (optional, default to close)
     * @param  int $fast_period Number of periods for fast moving average (optional, default to 12)
     * @param  int $slow_period Number of periods for slow moving average (optional, default to 26)
     * @param  int $signal_period The time period used for generating the signal line (optional, default to 9)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\TechnicalIndicatorResponseMacd[]
     */
    public function getTechnicalIndicatorMacd($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $series_type = 'close', $fast_period = '12', $slow_period = '26', $signal_period = '9')
    {
        list($response) = $this->getTechnicalIndicatorMacdWithHttpInfo($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type, $fast_period, $slow_period, $signal_period);
        return $response;
    }

    /**
     * Operation getTechnicalIndicatorMacdWithHttpInfo
     *
     * Momentum Indicators
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  string $series_type Specifies the price data type on which technical indicator is calculated (optional, default to close)
     * @param  int $fast_period Number of periods for fast moving average (optional, default to 12)
     * @param  int $slow_period Number of periods for slow moving average (optional, default to 26)
     * @param  int $signal_period The time period used for generating the signal line (optional, default to 9)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\TechnicalIndicatorResponseMacd[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getTechnicalIndicatorMacdWithHttpInfo($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $series_type = 'close', $fast_period = '12', $slow_period = '26', $signal_period = '9')
    {
        $returnType = '\Swagger\Client\Model\TechnicalIndicatorResponseMacd[]';
        $request = $this->getTechnicalIndicatorMacdRequest($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type, $fast_period, $slow_period, $signal_period);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\TechnicalIndicatorResponseMacd[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getTechnicalIndicatorMacdAsync
     *
     * Momentum Indicators
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  string $series_type Specifies the price data type on which technical indicator is calculated (optional, default to close)
     * @param  int $fast_period Number of periods for fast moving average (optional, default to 12)
     * @param  int $slow_period Number of periods for slow moving average (optional, default to 26)
     * @param  int $signal_period The time period used for generating the signal line (optional, default to 9)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTechnicalIndicatorMacdAsync($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $series_type = 'close', $fast_period = '12', $slow_period = '26', $signal_period = '9')
    {
        return $this->getTechnicalIndicatorMacdAsyncWithHttpInfo($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type, $fast_period, $slow_period, $signal_period)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getTechnicalIndicatorMacdAsyncWithHttpInfo
     *
     * Momentum Indicators
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  string $series_type Specifies the price data type on which technical indicator is calculated (optional, default to close)
     * @param  int $fast_period Number of periods for fast moving average (optional, default to 12)
     * @param  int $slow_period Number of periods for slow moving average (optional, default to 26)
     * @param  int $signal_period The time period used for generating the signal line (optional, default to 9)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTechnicalIndicatorMacdAsyncWithHttpInfo($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $series_type = 'close', $fast_period = '12', $slow_period = '26', $signal_period = '9')
    {
        $returnType = '\Swagger\Client\Model\TechnicalIndicatorResponseMacd[]';
        $request = $this->getTechnicalIndicatorMacdRequest($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type, $fast_period, $slow_period, $signal_period);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getTechnicalIndicatorMacd'
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  string $series_type Specifies the price data type on which technical indicator is calculated (optional, default to close)
     * @param  int $fast_period Number of periods for fast moving average (optional, default to 12)
     * @param  int $slow_period Number of periods for slow moving average (optional, default to 26)
     * @param  int $signal_period The time period used for generating the signal line (optional, default to 9)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getTechnicalIndicatorMacdRequest($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $series_type = 'close', $fast_period = '12', $slow_period = '26', $signal_period = '9')
    {
        // verify the required parameter 'dataset' is set
        if ($dataset === null || (is_array($dataset) && count($dataset) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $dataset when calling getTechnicalIndicatorMacd'
            );
        }
        // verify the required parameter 'ticker' is set
        if ($ticker === null || (is_array($ticker) && count($ticker) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ticker when calling getTechnicalIndicatorMacd'
            );
        }
        // verify the required parameter 'interval' is set
        if ($interval === null || (is_array($interval) && count($interval) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $interval when calling getTechnicalIndicatorMacd'
            );
        }

        $resourcePath = '/time_series/macd';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($cqs !== null) {
            $queryParams['cqs'] = ObjectSerializer::toQueryValue($cqs, null);
        }
        // query params
        if ($cik !== null) {
            $queryParams['cik'] = ObjectSerializer::toQueryValue($cik, null);
        }
        // query params
        if ($cusip !== null) {
            $queryParams['cusip'] = ObjectSerializer::toQueryValue($cusip, null);
        }
        // query params
        if ($isin !== null) {
            $queryParams['isin'] = ObjectSerializer::toQueryValue($isin, null);
        }
        // query params
        if ($composite_figi !== null) {
            $queryParams['composite_figi'] = ObjectSerializer::toQueryValue($composite_figi, null);
        }
        // query params
        if ($share_figi !== null) {
            $queryParams['share_figi'] = ObjectSerializer::toQueryValue($share_figi, null);
        }
        // query params
        if ($lei !== null) {
            $queryParams['lei'] = ObjectSerializer::toQueryValue($lei, null);
        }
        // query params
        if ($dataset !== null) {
            $queryParams['dataset'] = ObjectSerializer::toQueryValue($dataset, null);
        }
        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }
        // query params
        if ($interval !== null) {
            $queryParams['interval'] = ObjectSerializer::toQueryValue($interval, null);
        }
        // query params
        if ($market !== null) {
            $queryParams['market'] = ObjectSerializer::toQueryValue($market, null);
        }
        // query params
        if ($country !== null) {
            $queryParams['country'] = ObjectSerializer::toQueryValue($country, null);
        }
        // query params
        if ($start_at !== null) {
            $queryParams['start_at'] = ObjectSerializer::toQueryValue($start_at, 'int64');
        }
        // query params
        if ($end_at !== null) {
            $queryParams['end_at'] = ObjectSerializer::toQueryValue($end_at, 'int64');
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page, 'int32');
        }
        // query params
        if ($page_size !== null) {
            $queryParams['page_size'] = ObjectSerializer::toQueryValue($page_size, 'int32');
        }
        // query params
        if ($order !== null) {
            $queryParams['order'] = ObjectSerializer::toQueryValue($order, null);
        }
        // query params
        if ($prepost !== null) {
            $queryParams['prepost'] = ObjectSerializer::toQueryValue($prepost, null);
        }
        // query params
        if ($adjust !== null) {
            $queryParams['adjust'] = ObjectSerializer::toQueryValue($adjust, null);
        }
        // query params
        if ($series_type !== null) {
            $queryParams['series_type'] = ObjectSerializer::toQueryValue($series_type, null);
        }
        // query params
        if ($fast_period !== null) {
            $queryParams['fast_period'] = ObjectSerializer::toQueryValue($fast_period, 'int64');
        }
        // query params
        if ($slow_period !== null) {
            $queryParams['slow_period'] = ObjectSerializer::toQueryValue($slow_period, 'int64');
        }
        // query params
        if ($signal_period !== null) {
            $queryParams['signal_period'] = ObjectSerializer::toQueryValue($signal_period, 'int64');
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getTechnicalIndicatorObv
     *
     * Volume Indicators
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  string $series_type Specifies the price data type on which technical indicator is calculated (optional, default to close)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\TechnicalIndicatorResponseObv[]
     */
    public function getTechnicalIndicatorObv($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $series_type = 'close')
    {
        list($response) = $this->getTechnicalIndicatorObvWithHttpInfo($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type);
        return $response;
    }

    /**
     * Operation getTechnicalIndicatorObvWithHttpInfo
     *
     * Volume Indicators
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  string $series_type Specifies the price data type on which technical indicator is calculated (optional, default to close)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\TechnicalIndicatorResponseObv[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getTechnicalIndicatorObvWithHttpInfo($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $series_type = 'close')
    {
        $returnType = '\Swagger\Client\Model\TechnicalIndicatorResponseObv[]';
        $request = $this->getTechnicalIndicatorObvRequest($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\TechnicalIndicatorResponseObv[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getTechnicalIndicatorObvAsync
     *
     * Volume Indicators
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  string $series_type Specifies the price data type on which technical indicator is calculated (optional, default to close)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTechnicalIndicatorObvAsync($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $series_type = 'close')
    {
        return $this->getTechnicalIndicatorObvAsyncWithHttpInfo($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getTechnicalIndicatorObvAsyncWithHttpInfo
     *
     * Volume Indicators
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  string $series_type Specifies the price data type on which technical indicator is calculated (optional, default to close)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTechnicalIndicatorObvAsyncWithHttpInfo($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $series_type = 'close')
    {
        $returnType = '\Swagger\Client\Model\TechnicalIndicatorResponseObv[]';
        $request = $this->getTechnicalIndicatorObvRequest($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getTechnicalIndicatorObv'
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  string $series_type Specifies the price data type on which technical indicator is calculated (optional, default to close)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getTechnicalIndicatorObvRequest($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $series_type = 'close')
    {
        // verify the required parameter 'dataset' is set
        if ($dataset === null || (is_array($dataset) && count($dataset) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $dataset when calling getTechnicalIndicatorObv'
            );
        }
        // verify the required parameter 'ticker' is set
        if ($ticker === null || (is_array($ticker) && count($ticker) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ticker when calling getTechnicalIndicatorObv'
            );
        }
        // verify the required parameter 'interval' is set
        if ($interval === null || (is_array($interval) && count($interval) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $interval when calling getTechnicalIndicatorObv'
            );
        }

        $resourcePath = '/time_series/obv';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($cqs !== null) {
            $queryParams['cqs'] = ObjectSerializer::toQueryValue($cqs, null);
        }
        // query params
        if ($cik !== null) {
            $queryParams['cik'] = ObjectSerializer::toQueryValue($cik, null);
        }
        // query params
        if ($cusip !== null) {
            $queryParams['cusip'] = ObjectSerializer::toQueryValue($cusip, null);
        }
        // query params
        if ($isin !== null) {
            $queryParams['isin'] = ObjectSerializer::toQueryValue($isin, null);
        }
        // query params
        if ($composite_figi !== null) {
            $queryParams['composite_figi'] = ObjectSerializer::toQueryValue($composite_figi, null);
        }
        // query params
        if ($share_figi !== null) {
            $queryParams['share_figi'] = ObjectSerializer::toQueryValue($share_figi, null);
        }
        // query params
        if ($lei !== null) {
            $queryParams['lei'] = ObjectSerializer::toQueryValue($lei, null);
        }
        // query params
        if ($dataset !== null) {
            $queryParams['dataset'] = ObjectSerializer::toQueryValue($dataset, null);
        }
        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }
        // query params
        if ($interval !== null) {
            $queryParams['interval'] = ObjectSerializer::toQueryValue($interval, null);
        }
        // query params
        if ($market !== null) {
            $queryParams['market'] = ObjectSerializer::toQueryValue($market, null);
        }
        // query params
        if ($country !== null) {
            $queryParams['country'] = ObjectSerializer::toQueryValue($country, null);
        }
        // query params
        if ($start_at !== null) {
            $queryParams['start_at'] = ObjectSerializer::toQueryValue($start_at, 'int64');
        }
        // query params
        if ($end_at !== null) {
            $queryParams['end_at'] = ObjectSerializer::toQueryValue($end_at, 'int64');
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page, 'int32');
        }
        // query params
        if ($page_size !== null) {
            $queryParams['page_size'] = ObjectSerializer::toQueryValue($page_size, 'int32');
        }
        // query params
        if ($order !== null) {
            $queryParams['order'] = ObjectSerializer::toQueryValue($order, null);
        }
        // query params
        if ($prepost !== null) {
            $queryParams['prepost'] = ObjectSerializer::toQueryValue($prepost, null);
        }
        // query params
        if ($adjust !== null) {
            $queryParams['adjust'] = ObjectSerializer::toQueryValue($adjust, null);
        }
        // query params
        if ($series_type !== null) {
            $queryParams['series_type'] = ObjectSerializer::toQueryValue($series_type, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getTechnicalIndicatorRsi
     *
     * Momentum Indicators
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  string $series_type Specifies the price data type on which technical indicator is calculated (optional, default to close)
     * @param  int $time_period Number of periods to average over (optional, default to 14)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\TechnicalIndicatorResponseRsi[]
     */
    public function getTechnicalIndicatorRsi($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $series_type = 'close', $time_period = '14')
    {
        list($response) = $this->getTechnicalIndicatorRsiWithHttpInfo($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type, $time_period);
        return $response;
    }

    /**
     * Operation getTechnicalIndicatorRsiWithHttpInfo
     *
     * Momentum Indicators
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  string $series_type Specifies the price data type on which technical indicator is calculated (optional, default to close)
     * @param  int $time_period Number of periods to average over (optional, default to 14)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\TechnicalIndicatorResponseRsi[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getTechnicalIndicatorRsiWithHttpInfo($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $series_type = 'close', $time_period = '14')
    {
        $returnType = '\Swagger\Client\Model\TechnicalIndicatorResponseRsi[]';
        $request = $this->getTechnicalIndicatorRsiRequest($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type, $time_period);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\TechnicalIndicatorResponseRsi[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getTechnicalIndicatorRsiAsync
     *
     * Momentum Indicators
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  string $series_type Specifies the price data type on which technical indicator is calculated (optional, default to close)
     * @param  int $time_period Number of periods to average over (optional, default to 14)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTechnicalIndicatorRsiAsync($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $series_type = 'close', $time_period = '14')
    {
        return $this->getTechnicalIndicatorRsiAsyncWithHttpInfo($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type, $time_period)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getTechnicalIndicatorRsiAsyncWithHttpInfo
     *
     * Momentum Indicators
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  string $series_type Specifies the price data type on which technical indicator is calculated (optional, default to close)
     * @param  int $time_period Number of periods to average over (optional, default to 14)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTechnicalIndicatorRsiAsyncWithHttpInfo($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $series_type = 'close', $time_period = '14')
    {
        $returnType = '\Swagger\Client\Model\TechnicalIndicatorResponseRsi[]';
        $request = $this->getTechnicalIndicatorRsiRequest($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $series_type, $time_period);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getTechnicalIndicatorRsi'
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  string $series_type Specifies the price data type on which technical indicator is calculated (optional, default to close)
     * @param  int $time_period Number of periods to average over (optional, default to 14)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getTechnicalIndicatorRsiRequest($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $series_type = 'close', $time_period = '14')
    {
        // verify the required parameter 'dataset' is set
        if ($dataset === null || (is_array($dataset) && count($dataset) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $dataset when calling getTechnicalIndicatorRsi'
            );
        }
        // verify the required parameter 'ticker' is set
        if ($ticker === null || (is_array($ticker) && count($ticker) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ticker when calling getTechnicalIndicatorRsi'
            );
        }
        // verify the required parameter 'interval' is set
        if ($interval === null || (is_array($interval) && count($interval) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $interval when calling getTechnicalIndicatorRsi'
            );
        }

        $resourcePath = '/time_series/rsi';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($cqs !== null) {
            $queryParams['cqs'] = ObjectSerializer::toQueryValue($cqs, null);
        }
        // query params
        if ($cik !== null) {
            $queryParams['cik'] = ObjectSerializer::toQueryValue($cik, null);
        }
        // query params
        if ($cusip !== null) {
            $queryParams['cusip'] = ObjectSerializer::toQueryValue($cusip, null);
        }
        // query params
        if ($isin !== null) {
            $queryParams['isin'] = ObjectSerializer::toQueryValue($isin, null);
        }
        // query params
        if ($composite_figi !== null) {
            $queryParams['composite_figi'] = ObjectSerializer::toQueryValue($composite_figi, null);
        }
        // query params
        if ($share_figi !== null) {
            $queryParams['share_figi'] = ObjectSerializer::toQueryValue($share_figi, null);
        }
        // query params
        if ($lei !== null) {
            $queryParams['lei'] = ObjectSerializer::toQueryValue($lei, null);
        }
        // query params
        if ($dataset !== null) {
            $queryParams['dataset'] = ObjectSerializer::toQueryValue($dataset, null);
        }
        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }
        // query params
        if ($interval !== null) {
            $queryParams['interval'] = ObjectSerializer::toQueryValue($interval, null);
        }
        // query params
        if ($market !== null) {
            $queryParams['market'] = ObjectSerializer::toQueryValue($market, null);
        }
        // query params
        if ($country !== null) {
            $queryParams['country'] = ObjectSerializer::toQueryValue($country, null);
        }
        // query params
        if ($start_at !== null) {
            $queryParams['start_at'] = ObjectSerializer::toQueryValue($start_at, 'int64');
        }
        // query params
        if ($end_at !== null) {
            $queryParams['end_at'] = ObjectSerializer::toQueryValue($end_at, 'int64');
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page, 'int32');
        }
        // query params
        if ($page_size !== null) {
            $queryParams['page_size'] = ObjectSerializer::toQueryValue($page_size, 'int32');
        }
        // query params
        if ($order !== null) {
            $queryParams['order'] = ObjectSerializer::toQueryValue($order, null);
        }
        // query params
        if ($prepost !== null) {
            $queryParams['prepost'] = ObjectSerializer::toQueryValue($prepost, null);
        }
        // query params
        if ($adjust !== null) {
            $queryParams['adjust'] = ObjectSerializer::toQueryValue($adjust, null);
        }
        // query params
        if ($series_type !== null) {
            $queryParams['series_type'] = ObjectSerializer::toQueryValue($series_type, null);
        }
        // query params
        if ($time_period !== null) {
            $queryParams['time_period'] = ObjectSerializer::toQueryValue($time_period, 'int64');
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getTechnicalIndicatorSar
     *
     * Overlap Studies
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  double $acceleration Initial acceleration factor (optional, default to 0.02)
     * @param  double $maximum Maximum value for the acceleration factor (optional, default to 0.2)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\TechnicalIndicatorResponseSar[]
     */
    public function getTechnicalIndicatorSar($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $acceleration = '0.02', $maximum = '0.2')
    {
        list($response) = $this->getTechnicalIndicatorSarWithHttpInfo($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $acceleration, $maximum);
        return $response;
    }

    /**
     * Operation getTechnicalIndicatorSarWithHttpInfo
     *
     * Overlap Studies
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  double $acceleration Initial acceleration factor (optional, default to 0.02)
     * @param  double $maximum Maximum value for the acceleration factor (optional, default to 0.2)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\TechnicalIndicatorResponseSar[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getTechnicalIndicatorSarWithHttpInfo($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $acceleration = '0.02', $maximum = '0.2')
    {
        $returnType = '\Swagger\Client\Model\TechnicalIndicatorResponseSar[]';
        $request = $this->getTechnicalIndicatorSarRequest($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $acceleration, $maximum);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\TechnicalIndicatorResponseSar[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getTechnicalIndicatorSarAsync
     *
     * Overlap Studies
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  double $acceleration Initial acceleration factor (optional, default to 0.02)
     * @param  double $maximum Maximum value for the acceleration factor (optional, default to 0.2)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTechnicalIndicatorSarAsync($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $acceleration = '0.02', $maximum = '0.2')
    {
        return $this->getTechnicalIndicatorSarAsyncWithHttpInfo($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $acceleration, $maximum)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getTechnicalIndicatorSarAsyncWithHttpInfo
     *
     * Overlap Studies
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  double $acceleration Initial acceleration factor (optional, default to 0.02)
     * @param  double $maximum Maximum value for the acceleration factor (optional, default to 0.2)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTechnicalIndicatorSarAsyncWithHttpInfo($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $acceleration = '0.02', $maximum = '0.2')
    {
        $returnType = '\Swagger\Client\Model\TechnicalIndicatorResponseSar[]';
        $request = $this->getTechnicalIndicatorSarRequest($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $acceleration, $maximum);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getTechnicalIndicatorSar'
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  double $acceleration Initial acceleration factor (optional, default to 0.02)
     * @param  double $maximum Maximum value for the acceleration factor (optional, default to 0.2)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getTechnicalIndicatorSarRequest($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $acceleration = '0.02', $maximum = '0.2')
    {
        // verify the required parameter 'dataset' is set
        if ($dataset === null || (is_array($dataset) && count($dataset) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $dataset when calling getTechnicalIndicatorSar'
            );
        }
        // verify the required parameter 'ticker' is set
        if ($ticker === null || (is_array($ticker) && count($ticker) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ticker when calling getTechnicalIndicatorSar'
            );
        }
        // verify the required parameter 'interval' is set
        if ($interval === null || (is_array($interval) && count($interval) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $interval when calling getTechnicalIndicatorSar'
            );
        }

        $resourcePath = '/time_series/sar';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($cqs !== null) {
            $queryParams['cqs'] = ObjectSerializer::toQueryValue($cqs, null);
        }
        // query params
        if ($cik !== null) {
            $queryParams['cik'] = ObjectSerializer::toQueryValue($cik, null);
        }
        // query params
        if ($cusip !== null) {
            $queryParams['cusip'] = ObjectSerializer::toQueryValue($cusip, null);
        }
        // query params
        if ($isin !== null) {
            $queryParams['isin'] = ObjectSerializer::toQueryValue($isin, null);
        }
        // query params
        if ($composite_figi !== null) {
            $queryParams['composite_figi'] = ObjectSerializer::toQueryValue($composite_figi, null);
        }
        // query params
        if ($share_figi !== null) {
            $queryParams['share_figi'] = ObjectSerializer::toQueryValue($share_figi, null);
        }
        // query params
        if ($lei !== null) {
            $queryParams['lei'] = ObjectSerializer::toQueryValue($lei, null);
        }
        // query params
        if ($dataset !== null) {
            $queryParams['dataset'] = ObjectSerializer::toQueryValue($dataset, null);
        }
        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }
        // query params
        if ($interval !== null) {
            $queryParams['interval'] = ObjectSerializer::toQueryValue($interval, null);
        }
        // query params
        if ($market !== null) {
            $queryParams['market'] = ObjectSerializer::toQueryValue($market, null);
        }
        // query params
        if ($country !== null) {
            $queryParams['country'] = ObjectSerializer::toQueryValue($country, null);
        }
        // query params
        if ($start_at !== null) {
            $queryParams['start_at'] = ObjectSerializer::toQueryValue($start_at, 'int64');
        }
        // query params
        if ($end_at !== null) {
            $queryParams['end_at'] = ObjectSerializer::toQueryValue($end_at, 'int64');
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page, 'int32');
        }
        // query params
        if ($page_size !== null) {
            $queryParams['page_size'] = ObjectSerializer::toQueryValue($page_size, 'int32');
        }
        // query params
        if ($order !== null) {
            $queryParams['order'] = ObjectSerializer::toQueryValue($order, null);
        }
        // query params
        if ($prepost !== null) {
            $queryParams['prepost'] = ObjectSerializer::toQueryValue($prepost, null);
        }
        // query params
        if ($adjust !== null) {
            $queryParams['adjust'] = ObjectSerializer::toQueryValue($adjust, null);
        }
        // query params
        if ($acceleration !== null) {
            $queryParams['acceleration'] = ObjectSerializer::toQueryValue($acceleration, 'double');
        }
        // query params
        if ($maximum !== null) {
            $queryParams['maximum'] = ObjectSerializer::toQueryValue($maximum, 'double');
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getTechnicalIndicatorStoch
     *
     * Momentum Indicators
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  int $fast_k_period The time period for the fast %K line in the Stochastic Oscillator (optional, default to 14)
     * @param  int $slow_k_period The time period for the slow %K line in the Stochastic Oscillator (optional, default to 1)
     * @param  int $slow_d_period The time period for the slow %D line in the Stochastic Oscillator (optional, default to 3)
     * @param  string $slow_kma_type The type of slow %K Moving Average used (optional, default to SMA)
     * @param  string $slow_dma_type The type of slow Displaced Moving Average used (optional, default to SMA)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\TechnicalIndicatorResponseStoch[]
     */
    public function getTechnicalIndicatorStoch($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $fast_k_period = '14', $slow_k_period = '1', $slow_d_period = '3', $slow_kma_type = 'SMA', $slow_dma_type = 'SMA')
    {
        list($response) = $this->getTechnicalIndicatorStochWithHttpInfo($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $fast_k_period, $slow_k_period, $slow_d_period, $slow_kma_type, $slow_dma_type);
        return $response;
    }

    /**
     * Operation getTechnicalIndicatorStochWithHttpInfo
     *
     * Momentum Indicators
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  int $fast_k_period The time period for the fast %K line in the Stochastic Oscillator (optional, default to 14)
     * @param  int $slow_k_period The time period for the slow %K line in the Stochastic Oscillator (optional, default to 1)
     * @param  int $slow_d_period The time period for the slow %D line in the Stochastic Oscillator (optional, default to 3)
     * @param  string $slow_kma_type The type of slow %K Moving Average used (optional, default to SMA)
     * @param  string $slow_dma_type The type of slow Displaced Moving Average used (optional, default to SMA)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\TechnicalIndicatorResponseStoch[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getTechnicalIndicatorStochWithHttpInfo($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $fast_k_period = '14', $slow_k_period = '1', $slow_d_period = '3', $slow_kma_type = 'SMA', $slow_dma_type = 'SMA')
    {
        $returnType = '\Swagger\Client\Model\TechnicalIndicatorResponseStoch[]';
        $request = $this->getTechnicalIndicatorStochRequest($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $fast_k_period, $slow_k_period, $slow_d_period, $slow_kma_type, $slow_dma_type);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\TechnicalIndicatorResponseStoch[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getTechnicalIndicatorStochAsync
     *
     * Momentum Indicators
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  int $fast_k_period The time period for the fast %K line in the Stochastic Oscillator (optional, default to 14)
     * @param  int $slow_k_period The time period for the slow %K line in the Stochastic Oscillator (optional, default to 1)
     * @param  int $slow_d_period The time period for the slow %D line in the Stochastic Oscillator (optional, default to 3)
     * @param  string $slow_kma_type The type of slow %K Moving Average used (optional, default to SMA)
     * @param  string $slow_dma_type The type of slow Displaced Moving Average used (optional, default to SMA)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTechnicalIndicatorStochAsync($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $fast_k_period = '14', $slow_k_period = '1', $slow_d_period = '3', $slow_kma_type = 'SMA', $slow_dma_type = 'SMA')
    {
        return $this->getTechnicalIndicatorStochAsyncWithHttpInfo($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $fast_k_period, $slow_k_period, $slow_d_period, $slow_kma_type, $slow_dma_type)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getTechnicalIndicatorStochAsyncWithHttpInfo
     *
     * Momentum Indicators
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  int $fast_k_period The time period for the fast %K line in the Stochastic Oscillator (optional, default to 14)
     * @param  int $slow_k_period The time period for the slow %K line in the Stochastic Oscillator (optional, default to 1)
     * @param  int $slow_d_period The time period for the slow %D line in the Stochastic Oscillator (optional, default to 3)
     * @param  string $slow_kma_type The type of slow %K Moving Average used (optional, default to SMA)
     * @param  string $slow_dma_type The type of slow Displaced Moving Average used (optional, default to SMA)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTechnicalIndicatorStochAsyncWithHttpInfo($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $fast_k_period = '14', $slow_k_period = '1', $slow_d_period = '3', $slow_kma_type = 'SMA', $slow_dma_type = 'SMA')
    {
        $returnType = '\Swagger\Client\Model\TechnicalIndicatorResponseStoch[]';
        $request = $this->getTechnicalIndicatorStochRequest($dataset, $ticker, $interval, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country, $start_at, $end_at, $page, $page_size, $order, $prepost, $adjust, $fast_k_period, $slow_k_period, $slow_d_period, $slow_kma_type, $slow_dma_type);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getTechnicalIndicatorStoch'
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $interval Interval between two consecutive points in time series (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter output by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter output by end time using a UNIX timestamp (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 30)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  bool $prepost Indicates whether data should be included for extended hours of trading (optional, default to false)
     * @param  string $adjust Apply adjusting for data (all, splits, dividends, none) (optional, default to all)
     * @param  int $fast_k_period The time period for the fast %K line in the Stochastic Oscillator (optional, default to 14)
     * @param  int $slow_k_period The time period for the slow %K line in the Stochastic Oscillator (optional, default to 1)
     * @param  int $slow_d_period The time period for the slow %D line in the Stochastic Oscillator (optional, default to 3)
     * @param  string $slow_kma_type The type of slow %K Moving Average used (optional, default to SMA)
     * @param  string $slow_dma_type The type of slow Displaced Moving Average used (optional, default to SMA)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getTechnicalIndicatorStochRequest($dataset, $ticker, $interval, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null, $start_at = null, $end_at = null, $page = '0', $page_size = '30', $order = 'desc', $prepost = 'false', $adjust = 'all', $fast_k_period = '14', $slow_k_period = '1', $slow_d_period = '3', $slow_kma_type = 'SMA', $slow_dma_type = 'SMA')
    {
        // verify the required parameter 'dataset' is set
        if ($dataset === null || (is_array($dataset) && count($dataset) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $dataset when calling getTechnicalIndicatorStoch'
            );
        }
        // verify the required parameter 'ticker' is set
        if ($ticker === null || (is_array($ticker) && count($ticker) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ticker when calling getTechnicalIndicatorStoch'
            );
        }
        // verify the required parameter 'interval' is set
        if ($interval === null || (is_array($interval) && count($interval) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $interval when calling getTechnicalIndicatorStoch'
            );
        }

        $resourcePath = '/time_series/stoch';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($cqs !== null) {
            $queryParams['cqs'] = ObjectSerializer::toQueryValue($cqs, null);
        }
        // query params
        if ($cik !== null) {
            $queryParams['cik'] = ObjectSerializer::toQueryValue($cik, null);
        }
        // query params
        if ($cusip !== null) {
            $queryParams['cusip'] = ObjectSerializer::toQueryValue($cusip, null);
        }
        // query params
        if ($isin !== null) {
            $queryParams['isin'] = ObjectSerializer::toQueryValue($isin, null);
        }
        // query params
        if ($composite_figi !== null) {
            $queryParams['composite_figi'] = ObjectSerializer::toQueryValue($composite_figi, null);
        }
        // query params
        if ($share_figi !== null) {
            $queryParams['share_figi'] = ObjectSerializer::toQueryValue($share_figi, null);
        }
        // query params
        if ($lei !== null) {
            $queryParams['lei'] = ObjectSerializer::toQueryValue($lei, null);
        }
        // query params
        if ($dataset !== null) {
            $queryParams['dataset'] = ObjectSerializer::toQueryValue($dataset, null);
        }
        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }
        // query params
        if ($interval !== null) {
            $queryParams['interval'] = ObjectSerializer::toQueryValue($interval, null);
        }
        // query params
        if ($market !== null) {
            $queryParams['market'] = ObjectSerializer::toQueryValue($market, null);
        }
        // query params
        if ($country !== null) {
            $queryParams['country'] = ObjectSerializer::toQueryValue($country, null);
        }
        // query params
        if ($start_at !== null) {
            $queryParams['start_at'] = ObjectSerializer::toQueryValue($start_at, 'int64');
        }
        // query params
        if ($end_at !== null) {
            $queryParams['end_at'] = ObjectSerializer::toQueryValue($end_at, 'int64');
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page, 'int32');
        }
        // query params
        if ($page_size !== null) {
            $queryParams['page_size'] = ObjectSerializer::toQueryValue($page_size, 'int32');
        }
        // query params
        if ($order !== null) {
            $queryParams['order'] = ObjectSerializer::toQueryValue($order, null);
        }
        // query params
        if ($prepost !== null) {
            $queryParams['prepost'] = ObjectSerializer::toQueryValue($prepost, null);
        }
        // query params
        if ($adjust !== null) {
            $queryParams['adjust'] = ObjectSerializer::toQueryValue($adjust, null);
        }
        // query params
        if ($fast_k_period !== null) {
            $queryParams['fast_k_period'] = ObjectSerializer::toQueryValue($fast_k_period, 'int64');
        }
        // query params
        if ($slow_k_period !== null) {
            $queryParams['slow_k_period'] = ObjectSerializer::toQueryValue($slow_k_period, 'int64');
        }
        // query params
        if ($slow_d_period !== null) {
            $queryParams['slow_d_period'] = ObjectSerializer::toQueryValue($slow_d_period, 'int64');
        }
        // query params
        if ($slow_kma_type !== null) {
            $queryParams['slow_kma_type'] = ObjectSerializer::toQueryValue($slow_kma_type, null);
        }
        // query params
        if ($slow_dma_type !== null) {
            $queryParams['slow_dma_type'] = ObjectSerializer::toQueryValue($slow_dma_type, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getTickerSnapshot
     *
     * Ticker snapshot
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\InlineResponse200
     */
    public function getTickerSnapshot($dataset, $ticker, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null)
    {
        list($response) = $this->getTickerSnapshotWithHttpInfo($dataset, $ticker, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country);
        return $response;
    }

    /**
     * Operation getTickerSnapshotWithHttpInfo
     *
     * Ticker snapshot
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\InlineResponse200, HTTP status code, HTTP response headers (array of strings)
     */
    public function getTickerSnapshotWithHttpInfo($dataset, $ticker, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse200';
        $request = $this->getTickerSnapshotRequest($dataset, $ticker, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\InlineResponse200',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getTickerSnapshotAsync
     *
     * Ticker snapshot
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTickerSnapshotAsync($dataset, $ticker, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null)
    {
        return $this->getTickerSnapshotAsyncWithHttpInfo($dataset, $ticker, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getTickerSnapshotAsyncWithHttpInfo
     *
     * Ticker snapshot
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTickerSnapshotAsyncWithHttpInfo($dataset, $ticker, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null)
    {
        $returnType = '\Swagger\Client\Model\InlineResponse200';
        $request = $this->getTickerSnapshotRequest($dataset, $ticker, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $market, $country);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getTickerSnapshot'
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $market Filter by market (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getTickerSnapshotRequest($dataset, $ticker, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $market = null, $country = null)
    {
        // verify the required parameter 'dataset' is set
        if ($dataset === null || (is_array($dataset) && count($dataset) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $dataset when calling getTickerSnapshot'
            );
        }
        // verify the required parameter 'ticker' is set
        if ($ticker === null || (is_array($ticker) && count($ticker) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ticker when calling getTickerSnapshot'
            );
        }

        $resourcePath = '/ticker/snapshot';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($cqs !== null) {
            $queryParams['cqs'] = ObjectSerializer::toQueryValue($cqs, null);
        }
        // query params
        if ($cik !== null) {
            $queryParams['cik'] = ObjectSerializer::toQueryValue($cik, null);
        }
        // query params
        if ($cusip !== null) {
            $queryParams['cusip'] = ObjectSerializer::toQueryValue($cusip, null);
        }
        // query params
        if ($isin !== null) {
            $queryParams['isin'] = ObjectSerializer::toQueryValue($isin, null);
        }
        // query params
        if ($composite_figi !== null) {
            $queryParams['composite_figi'] = ObjectSerializer::toQueryValue($composite_figi, null);
        }
        // query params
        if ($share_figi !== null) {
            $queryParams['share_figi'] = ObjectSerializer::toQueryValue($share_figi, null);
        }
        // query params
        if ($lei !== null) {
            $queryParams['lei'] = ObjectSerializer::toQueryValue($lei, null);
        }
        // query params
        if ($dataset !== null) {
            $queryParams['dataset'] = ObjectSerializer::toQueryValue($dataset, null);
        }
        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }
        // query params
        if ($market !== null) {
            $queryParams['market'] = ObjectSerializer::toQueryValue($market, null);
        }
        // query params
        if ($country !== null) {
            $queryParams['country'] = ObjectSerializer::toQueryValue($country, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getTrades
     *
     * Trades
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter trades by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter trades by end time using a UNIX timestamp (optional)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\TradesItem[]
     */
    public function getTrades($dataset, $ticker, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $country = null, $start_at = null, $end_at = null, $order = 'desc', $page = '0', $page_size = '1000')
    {
        list($response) = $this->getTradesWithHttpInfo($dataset, $ticker, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $country, $start_at, $end_at, $order, $page, $page_size);
        return $response;
    }

    /**
     * Operation getTradesWithHttpInfo
     *
     * Trades
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter trades by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter trades by end time using a UNIX timestamp (optional)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\TradesItem[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getTradesWithHttpInfo($dataset, $ticker, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $country = null, $start_at = null, $end_at = null, $order = 'desc', $page = '0', $page_size = '1000')
    {
        $returnType = '\Swagger\Client\Model\TradesItem[]';
        $request = $this->getTradesRequest($dataset, $ticker, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $country, $start_at, $end_at, $order, $page, $page_size);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\TradesItem[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getTradesAsync
     *
     * Trades
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter trades by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter trades by end time using a UNIX timestamp (optional)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTradesAsync($dataset, $ticker, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $country = null, $start_at = null, $end_at = null, $order = 'desc', $page = '0', $page_size = '1000')
    {
        return $this->getTradesAsyncWithHttpInfo($dataset, $ticker, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $country, $start_at, $end_at, $order, $page, $page_size)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getTradesAsyncWithHttpInfo
     *
     * Trades
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter trades by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter trades by end time using a UNIX timestamp (optional)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTradesAsyncWithHttpInfo($dataset, $ticker, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $country = null, $start_at = null, $end_at = null, $order = 'desc', $page = '0', $page_size = '1000')
    {
        $returnType = '\Swagger\Client\Model\TradesItem[]';
        $request = $this->getTradesRequest($dataset, $ticker, $cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $country, $start_at, $end_at, $order, $page, $page_size);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getTrades'
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (required)
     * @param  string $ticker Filter by ticker symbol (required)
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  int $start_at Filter trades by start time using a UNIX timestamp (optional)
     * @param  int $end_at Filter trades by end time using a UNIX timestamp (optional)
     * @param  string $order Sorting order of the output series (optional, default to desc)
     * @param  int $page Specific page of a paginated result to be displayed (optional, default to 0)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getTradesRequest($dataset, $ticker, $cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $country = null, $start_at = null, $end_at = null, $order = 'desc', $page = '0', $page_size = '1000')
    {
        // verify the required parameter 'dataset' is set
        if ($dataset === null || (is_array($dataset) && count($dataset) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $dataset when calling getTrades'
            );
        }
        // verify the required parameter 'ticker' is set
        if ($ticker === null || (is_array($ticker) && count($ticker) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ticker when calling getTrades'
            );
        }

        $resourcePath = '/trades';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($cqs !== null) {
            $queryParams['cqs'] = ObjectSerializer::toQueryValue($cqs, null);
        }
        // query params
        if ($cik !== null) {
            $queryParams['cik'] = ObjectSerializer::toQueryValue($cik, null);
        }
        // query params
        if ($cusip !== null) {
            $queryParams['cusip'] = ObjectSerializer::toQueryValue($cusip, null);
        }
        // query params
        if ($isin !== null) {
            $queryParams['isin'] = ObjectSerializer::toQueryValue($isin, null);
        }
        // query params
        if ($composite_figi !== null) {
            $queryParams['composite_figi'] = ObjectSerializer::toQueryValue($composite_figi, null);
        }
        // query params
        if ($share_figi !== null) {
            $queryParams['share_figi'] = ObjectSerializer::toQueryValue($share_figi, null);
        }
        // query params
        if ($lei !== null) {
            $queryParams['lei'] = ObjectSerializer::toQueryValue($lei, null);
        }
        // query params
        if ($dataset !== null) {
            $queryParams['dataset'] = ObjectSerializer::toQueryValue($dataset, null);
        }
        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
        }
        // query params
        if ($country !== null) {
            $queryParams['country'] = ObjectSerializer::toQueryValue($country, null);
        }
        // query params
        if ($start_at !== null) {
            $queryParams['start_at'] = ObjectSerializer::toQueryValue($start_at, 'int64');
        }
        // query params
        if ($end_at !== null) {
            $queryParams['end_at'] = ObjectSerializer::toQueryValue($end_at, 'int64');
        }
        // query params
        if ($order !== null) {
            $queryParams['order'] = ObjectSerializer::toQueryValue($order, null);
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page, 'int32');
        }
        // query params
        if ($page_size !== null) {
            $queryParams['page_size'] = ObjectSerializer::toQueryValue($page_size, 'int32');
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', 'application/xml']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', 'application/xml'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('apikey');
        if ($apiKey !== null) {
            $queryParams['apikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
