<?php
/**
 * ReferenceApi
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
 * ReferenceApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ReferenceApi
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
     * Operation getApiUsage
     *
     * Api usage
     *
     * @param  string $product Product code (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ApiUsageResponseBody
     */
    public function getApiUsage($product = null)
    {
        list($response) = $this->getApiUsageWithHttpInfo($product);
        return $response;
    }

    /**
     * Operation getApiUsageWithHttpInfo
     *
     * Api usage
     *
     * @param  string $product Product code (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ApiUsageResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function getApiUsageWithHttpInfo($product = null)
    {
        $returnType = '\Swagger\Client\Model\ApiUsageResponseBody';
        $request = $this->getApiUsageRequest($product);

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
                        '\Swagger\Client\Model\ApiUsageResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getApiUsageAsync
     *
     * Api usage
     *
     * @param  string $product Product code (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getApiUsageAsync($product = null)
    {
        return $this->getApiUsageAsyncWithHttpInfo($product)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getApiUsageAsyncWithHttpInfo
     *
     * Api usage
     *
     * @param  string $product Product code (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getApiUsageAsyncWithHttpInfo($product = null)
    {
        $returnType = '\Swagger\Client\Model\ApiUsageResponseBody';
        $request = $this->getApiUsageRequest($product);

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
     * Create request for operation 'getApiUsage'
     *
     * @param  string $product Product code (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getApiUsageRequest($product = null)
    {

        $resourcePath = '/api_usage';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($product !== null) {
            $queryParams['product'] = ObjectSerializer::toQueryValue($product, null);
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
     * Operation getDatasets
     *
     * List of Finazon datasets
     *
     * @param  string $code Filter by Finazon&#x27;s dataset code (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\DatasetsResponseBody
     */
    public function getDatasets($code = null, $page = null, $page_size = '1000')
    {
        list($response) = $this->getDatasetsWithHttpInfo($code, $page, $page_size);
        return $response;
    }

    /**
     * Operation getDatasetsWithHttpInfo
     *
     * List of Finazon datasets
     *
     * @param  string $code Filter by Finazon&#x27;s dataset code (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\DatasetsResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function getDatasetsWithHttpInfo($code = null, $page = null, $page_size = '1000')
    {
        $returnType = '\Swagger\Client\Model\DatasetsResponseBody';
        $request = $this->getDatasetsRequest($code, $page, $page_size);

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
                        '\Swagger\Client\Model\DatasetsResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getDatasetsAsync
     *
     * List of Finazon datasets
     *
     * @param  string $code Filter by Finazon&#x27;s dataset code (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDatasetsAsync($code = null, $page = null, $page_size = '1000')
    {
        return $this->getDatasetsAsyncWithHttpInfo($code, $page, $page_size)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getDatasetsAsyncWithHttpInfo
     *
     * List of Finazon datasets
     *
     * @param  string $code Filter by Finazon&#x27;s dataset code (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDatasetsAsyncWithHttpInfo($code = null, $page = null, $page_size = '1000')
    {
        $returnType = '\Swagger\Client\Model\DatasetsResponseBody';
        $request = $this->getDatasetsRequest($code, $page, $page_size);

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
     * Create request for operation 'getDatasets'
     *
     * @param  string $code Filter by Finazon&#x27;s dataset code (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getDatasetsRequest($code = null, $page = null, $page_size = '1000')
    {

        $resourcePath = '/datasets';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($code !== null) {
            $queryParams['code'] = ObjectSerializer::toQueryValue($code, null);
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
     * Operation getExchangesCrypto
     *
     * List of crypto markets
     *
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ExchangesCryptoResponseBody
     */
    public function getExchangesCrypto($page = null, $page_size = '1000')
    {
        list($response) = $this->getExchangesCryptoWithHttpInfo($page, $page_size);
        return $response;
    }

    /**
     * Operation getExchangesCryptoWithHttpInfo
     *
     * List of crypto markets
     *
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ExchangesCryptoResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function getExchangesCryptoWithHttpInfo($page = null, $page_size = '1000')
    {
        $returnType = '\Swagger\Client\Model\ExchangesCryptoResponseBody';
        $request = $this->getExchangesCryptoRequest($page, $page_size);

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
                        '\Swagger\Client\Model\ExchangesCryptoResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getExchangesCryptoAsync
     *
     * List of crypto markets
     *
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getExchangesCryptoAsync($page = null, $page_size = '1000')
    {
        return $this->getExchangesCryptoAsyncWithHttpInfo($page, $page_size)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getExchangesCryptoAsyncWithHttpInfo
     *
     * List of crypto markets
     *
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getExchangesCryptoAsyncWithHttpInfo($page = null, $page_size = '1000')
    {
        $returnType = '\Swagger\Client\Model\ExchangesCryptoResponseBody';
        $request = $this->getExchangesCryptoRequest($page, $page_size);

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
     * Create request for operation 'getExchangesCrypto'
     *
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getExchangesCryptoRequest($page = null, $page_size = '1000')
    {

        $resourcePath = '/markets/crypto';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

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
     * Operation getExchangesStocks
     *
     * List of stock markets
     *
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  string $name Filter by market name (optional)
     * @param  string $code Filter by market identifier code (MIC) under ISO 10383 standard (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ExchangesStocksResponseBody
     */
    public function getExchangesStocks($country = null, $name = null, $code = null, $page = null, $page_size = '1000')
    {
        list($response) = $this->getExchangesStocksWithHttpInfo($country, $name, $code, $page, $page_size);
        return $response;
    }

    /**
     * Operation getExchangesStocksWithHttpInfo
     *
     * List of stock markets
     *
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  string $name Filter by market name (optional)
     * @param  string $code Filter by market identifier code (MIC) under ISO 10383 standard (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ExchangesStocksResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function getExchangesStocksWithHttpInfo($country = null, $name = null, $code = null, $page = null, $page_size = '1000')
    {
        $returnType = '\Swagger\Client\Model\ExchangesStocksResponseBody';
        $request = $this->getExchangesStocksRequest($country, $name, $code, $page, $page_size);

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
                        '\Swagger\Client\Model\ExchangesStocksResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getExchangesStocksAsync
     *
     * List of stock markets
     *
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  string $name Filter by market name (optional)
     * @param  string $code Filter by market identifier code (MIC) under ISO 10383 standard (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getExchangesStocksAsync($country = null, $name = null, $code = null, $page = null, $page_size = '1000')
    {
        return $this->getExchangesStocksAsyncWithHttpInfo($country, $name, $code, $page, $page_size)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getExchangesStocksAsyncWithHttpInfo
     *
     * List of stock markets
     *
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  string $name Filter by market name (optional)
     * @param  string $code Filter by market identifier code (MIC) under ISO 10383 standard (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getExchangesStocksAsyncWithHttpInfo($country = null, $name = null, $code = null, $page = null, $page_size = '1000')
    {
        $returnType = '\Swagger\Client\Model\ExchangesStocksResponseBody';
        $request = $this->getExchangesStocksRequest($country, $name, $code, $page, $page_size);

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
     * Create request for operation 'getExchangesStocks'
     *
     * @param  string $country Filter by ISO 3166 alpha-2 code (optional)
     * @param  string $name Filter by market name (optional)
     * @param  string $code Filter by market identifier code (MIC) under ISO 10383 standard (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getExchangesStocksRequest($country = null, $name = null, $code = null, $page = null, $page_size = '1000')
    {

        $resourcePath = '/markets/stocks';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($country !== null) {
            $queryParams['country'] = ObjectSerializer::toQueryValue($country, null);
        }
        // query params
        if ($name !== null) {
            $queryParams['name'] = ObjectSerializer::toQueryValue($name, null);
        }
        // query params
        if ($code !== null) {
            $queryParams['code'] = ObjectSerializer::toQueryValue($code, null);
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
     * Operation getMarketCenter
     *
     * List of market centers
     *
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\MarketCenterResponseBody
     */
    public function getMarketCenter()
    {
        list($response) = $this->getMarketCenterWithHttpInfo();
        return $response;
    }

    /**
     * Operation getMarketCenterWithHttpInfo
     *
     * List of market centers
     *
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\MarketCenterResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function getMarketCenterWithHttpInfo()
    {
        $returnType = '\Swagger\Client\Model\MarketCenterResponseBody';
        $request = $this->getMarketCenterRequest();

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
                        '\Swagger\Client\Model\MarketCenterResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getMarketCenterAsync
     *
     * List of market centers
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMarketCenterAsync()
    {
        return $this->getMarketCenterAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getMarketCenterAsyncWithHttpInfo
     *
     * List of market centers
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMarketCenterAsyncWithHttpInfo()
    {
        $returnType = '\Swagger\Client\Model\MarketCenterResponseBody';
        $request = $this->getMarketCenterRequest();

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
     * Create request for operation 'getMarketCenter'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getMarketCenterRequest()
    {

        $resourcePath = '/sip/market_center';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



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
     * Operation getPublishers
     *
     * List of Finazon publishers
     *
     * @param  string $code Filter by Finazon&#x27;s publisher code (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\PublishersResponseBody
     */
    public function getPublishers($code = null, $page = null, $page_size = '1000')
    {
        list($response) = $this->getPublishersWithHttpInfo($code, $page, $page_size);
        return $response;
    }

    /**
     * Operation getPublishersWithHttpInfo
     *
     * List of Finazon publishers
     *
     * @param  string $code Filter by Finazon&#x27;s publisher code (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\PublishersResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPublishersWithHttpInfo($code = null, $page = null, $page_size = '1000')
    {
        $returnType = '\Swagger\Client\Model\PublishersResponseBody';
        $request = $this->getPublishersRequest($code, $page, $page_size);

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
                        '\Swagger\Client\Model\PublishersResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPublishersAsync
     *
     * List of Finazon publishers
     *
     * @param  string $code Filter by Finazon&#x27;s publisher code (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPublishersAsync($code = null, $page = null, $page_size = '1000')
    {
        return $this->getPublishersAsyncWithHttpInfo($code, $page, $page_size)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPublishersAsyncWithHttpInfo
     *
     * List of Finazon publishers
     *
     * @param  string $code Filter by Finazon&#x27;s publisher code (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPublishersAsyncWithHttpInfo($code = null, $page = null, $page_size = '1000')
    {
        $returnType = '\Swagger\Client\Model\PublishersResponseBody';
        $request = $this->getPublishersRequest($code, $page, $page_size);

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
     * Create request for operation 'getPublishers'
     *
     * @param  string $code Filter by Finazon&#x27;s publisher code (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getPublishersRequest($code = null, $page = null, $page_size = '1000')
    {

        $resourcePath = '/publishers';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($code !== null) {
            $queryParams['code'] = ObjectSerializer::toQueryValue($code, null);
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
     * Operation getSymbolsCrypto
     *
     * List of crypto pairs
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\SymbolsCryptoResponseBody
     */
    public function getSymbolsCrypto($dataset = null, $ticker = null, $page = null, $page_size = '1000')
    {
        list($response) = $this->getSymbolsCryptoWithHttpInfo($dataset, $ticker, $page, $page_size);
        return $response;
    }

    /**
     * Operation getSymbolsCryptoWithHttpInfo
     *
     * List of crypto pairs
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\SymbolsCryptoResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function getSymbolsCryptoWithHttpInfo($dataset = null, $ticker = null, $page = null, $page_size = '1000')
    {
        $returnType = '\Swagger\Client\Model\SymbolsCryptoResponseBody';
        $request = $this->getSymbolsCryptoRequest($dataset, $ticker, $page, $page_size);

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
                        '\Swagger\Client\Model\SymbolsCryptoResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getSymbolsCryptoAsync
     *
     * List of crypto pairs
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSymbolsCryptoAsync($dataset = null, $ticker = null, $page = null, $page_size = '1000')
    {
        return $this->getSymbolsCryptoAsyncWithHttpInfo($dataset, $ticker, $page, $page_size)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getSymbolsCryptoAsyncWithHttpInfo
     *
     * List of crypto pairs
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSymbolsCryptoAsyncWithHttpInfo($dataset = null, $ticker = null, $page = null, $page_size = '1000')
    {
        $returnType = '\Swagger\Client\Model\SymbolsCryptoResponseBody';
        $request = $this->getSymbolsCryptoRequest($dataset, $ticker, $page, $page_size);

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
     * Create request for operation 'getSymbolsCrypto'
     *
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getSymbolsCryptoRequest($dataset = null, $ticker = null, $page = null, $page_size = '1000')
    {

        $resourcePath = '/tickers/crypto';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($dataset !== null) {
            $queryParams['dataset'] = ObjectSerializer::toQueryValue($dataset, null);
        }
        // query params
        if ($ticker !== null) {
            $queryParams['ticker'] = ObjectSerializer::toQueryValue($ticker, null);
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
     * Operation getSymbolsForex
     *
     * List of forex ticker symbols
     *
     * @param  string $ticker Filter by ticker symbol (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\SymbolsForexResponseBody
     */
    public function getSymbolsForex($ticker = null, $page = null, $page_size = '1000')
    {
        list($response) = $this->getSymbolsForexWithHttpInfo($ticker, $page, $page_size);
        return $response;
    }

    /**
     * Operation getSymbolsForexWithHttpInfo
     *
     * List of forex ticker symbols
     *
     * @param  string $ticker Filter by ticker symbol (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\SymbolsForexResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function getSymbolsForexWithHttpInfo($ticker = null, $page = null, $page_size = '1000')
    {
        $returnType = '\Swagger\Client\Model\SymbolsForexResponseBody';
        $request = $this->getSymbolsForexRequest($ticker, $page, $page_size);

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
                        '\Swagger\Client\Model\SymbolsForexResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getSymbolsForexAsync
     *
     * List of forex ticker symbols
     *
     * @param  string $ticker Filter by ticker symbol (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSymbolsForexAsync($ticker = null, $page = null, $page_size = '1000')
    {
        return $this->getSymbolsForexAsyncWithHttpInfo($ticker, $page, $page_size)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getSymbolsForexAsyncWithHttpInfo
     *
     * List of forex ticker symbols
     *
     * @param  string $ticker Filter by ticker symbol (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSymbolsForexAsyncWithHttpInfo($ticker = null, $page = null, $page_size = '1000')
    {
        $returnType = '\Swagger\Client\Model\SymbolsForexResponseBody';
        $request = $this->getSymbolsForexRequest($ticker, $page, $page_size);

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
     * Create request for operation 'getSymbolsForex'
     *
     * @param  string $ticker Filter by ticker symbol (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getSymbolsForexRequest($ticker = null, $page = null, $page_size = '1000')
    {

        $resourcePath = '/tickers/forex';
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
     * Operation getSymbolsStocks
     *
     * List of stock ticker symbols
     *
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\SymbolsStocksResponseBody
     */
    public function getSymbolsStocks($cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $dataset = null, $ticker = null, $page = null, $page_size = '1000')
    {
        list($response) = $this->getSymbolsStocksWithHttpInfo($cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $dataset, $ticker, $page, $page_size);
        return $response;
    }

    /**
     * Operation getSymbolsStocksWithHttpInfo
     *
     * List of stock ticker symbols
     *
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\SymbolsStocksResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function getSymbolsStocksWithHttpInfo($cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $dataset = null, $ticker = null, $page = null, $page_size = '1000')
    {
        $returnType = '\Swagger\Client\Model\SymbolsStocksResponseBody';
        $request = $this->getSymbolsStocksRequest($cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $dataset, $ticker, $page, $page_size);

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
                        '\Swagger\Client\Model\SymbolsStocksResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getSymbolsStocksAsync
     *
     * List of stock ticker symbols
     *
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSymbolsStocksAsync($cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $dataset = null, $ticker = null, $page = null, $page_size = '1000')
    {
        return $this->getSymbolsStocksAsyncWithHttpInfo($cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $dataset, $ticker, $page, $page_size)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getSymbolsStocksAsyncWithHttpInfo
     *
     * List of stock ticker symbols
     *
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSymbolsStocksAsyncWithHttpInfo($cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $dataset = null, $ticker = null, $page = null, $page_size = '1000')
    {
        $returnType = '\Swagger\Client\Model\SymbolsStocksResponseBody';
        $request = $this->getSymbolsStocksRequest($cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $dataset, $ticker, $page, $page_size);

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
     * Create request for operation 'getSymbolsStocks'
     *
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  string $dataset Filter by Finazon&#x27;s dataset code (optional)
     * @param  string $ticker Filter by ticker symbol (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getSymbolsStocksRequest($cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $dataset = null, $ticker = null, $page = null, $page_size = '1000')
    {

        $resourcePath = '/tickers/stocks';
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
     * Operation getSymbolsUSStocks
     *
     * List of US stock ticker symbols
     *
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\SymbolsUSStocksResponseBody
     */
    public function getSymbolsUSStocks($cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $page = null, $page_size = '1000', $ticker = null)
    {
        list($response) = $this->getSymbolsUSStocksWithHttpInfo($cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $page, $page_size, $ticker);
        return $response;
    }

    /**
     * Operation getSymbolsUSStocksWithHttpInfo
     *
     * List of US stock ticker symbols
     *
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\SymbolsUSStocksResponseBody, HTTP status code, HTTP response headers (array of strings)
     */
    public function getSymbolsUSStocksWithHttpInfo($cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $page = null, $page_size = '1000', $ticker = null)
    {
        $returnType = '\Swagger\Client\Model\SymbolsUSStocksResponseBody';
        $request = $this->getSymbolsUSStocksRequest($cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $page, $page_size, $ticker);

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
                        '\Swagger\Client\Model\SymbolsUSStocksResponseBody',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getSymbolsUSStocksAsync
     *
     * List of US stock ticker symbols
     *
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSymbolsUSStocksAsync($cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $page = null, $page_size = '1000', $ticker = null)
    {
        return $this->getSymbolsUSStocksAsyncWithHttpInfo($cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $page, $page_size, $ticker)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getSymbolsUSStocksAsyncWithHttpInfo
     *
     * List of US stock ticker symbols
     *
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSymbolsUSStocksAsyncWithHttpInfo($cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $page = null, $page_size = '1000', $ticker = null)
    {
        $returnType = '\Swagger\Client\Model\SymbolsUSStocksResponseBody';
        $request = $this->getSymbolsUSStocksRequest($cqs, $cik, $cusip, $isin, $composite_figi, $share_figi, $lei, $page, $page_size, $ticker);

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
     * Create request for operation 'getSymbolsUSStocks'
     *
     * @param  string $cqs Filter by cqs symbol (optional)
     * @param  string $cik Filter by cik code (optional)
     * @param  string $cusip Filter by cusip code (optional)
     * @param  string $isin Filter by isin code (optional)
     * @param  string $composite_figi Filter by composite figi code (optional)
     * @param  string $share_figi Filter by share class figi code (optional)
     * @param  string $lei Filter by lei code (optional)
     * @param  int $page Specific page of a paginated result to be displayed (optional)
     * @param  int $page_size Number of items displayed per page in a paginated result (optional, default to 1000)
     * @param  string $ticker Filter by ticker symbol (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getSymbolsUSStocksRequest($cqs = null, $cik = null, $cusip = null, $isin = null, $composite_figi = null, $share_figi = null, $lei = null, $page = null, $page_size = '1000', $ticker = null)
    {

        $resourcePath = '/tickers/us_stocks';
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
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page, 'int32');
        }
        // query params
        if ($page_size !== null) {
            $queryParams['page_size'] = ObjectSerializer::toQueryValue($page_size, 'int32');
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
