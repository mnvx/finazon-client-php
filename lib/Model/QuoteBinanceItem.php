<?php
/**
 * QuoteBinanceItem
 *
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

namespace Swagger\Client\Model;

use \ArrayAccess;
use \Swagger\Client\ObjectSerializer;

/**
 * QuoteBinanceItem Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class QuoteBinanceItem implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'QuoteBinanceItem';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        't' => 'int',
        'o' => 'double',
        'h' => 'double',
        'l' => 'double',
        'c' => 'double',
        'tr' => 'double',
        'bv' => 'double',
        'qv' => 'double',
        'tbv' => 'double',
        'tqv' => 'double'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        't' => 'int64',
        'o' => 'double',
        'h' => 'double',
        'l' => 'double',
        'c' => 'double',
        'tr' => 'double',
        'bv' => 'double',
        'qv' => 'double',
        'tbv' => 'double',
        'tqv' => 'double'
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        't' => 't',
        'o' => 'o',
        'h' => 'h',
        'l' => 'l',
        'c' => 'c',
        'tr' => 'tr',
        'bv' => 'bv',
        'qv' => 'qv',
        'tbv' => 'tbv',
        'tqv' => 'tqv'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        't' => 'setT',
        'o' => 'setO',
        'h' => 'setH',
        'l' => 'setL',
        'c' => 'setC',
        'tr' => 'setTr',
        'bv' => 'setBv',
        'qv' => 'setQv',
        'tbv' => 'setTbv',
        'tqv' => 'setTqv'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        't' => 'getT',
        'o' => 'getO',
        'h' => 'getH',
        'l' => 'getL',
        'c' => 'getC',
        'tr' => 'getTr',
        'bv' => 'getBv',
        'qv' => 'getQv',
        'tbv' => 'getTbv',
        'tqv' => 'getTqv'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }



    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['t'] = isset($data['t']) ? $data['t'] : null;
        $this->container['o'] = isset($data['o']) ? $data['o'] : null;
        $this->container['h'] = isset($data['h']) ? $data['h'] : null;
        $this->container['l'] = isset($data['l']) ? $data['l'] : null;
        $this->container['c'] = isset($data['c']) ? $data['c'] : null;
        $this->container['tr'] = isset($data['tr']) ? $data['tr'] : null;
        $this->container['bv'] = isset($data['bv']) ? $data['bv'] : null;
        $this->container['qv'] = isset($data['qv']) ? $data['qv'] : null;
        $this->container['tbv'] = isset($data['tbv']) ? $data['tbv'] : null;
        $this->container['tqv'] = isset($data['tqv']) ? $data['tqv'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets t
     *
     * @return int
     */
    public function getT()
    {
        return $this->container['t'];
    }

    /**
     * Sets t
     *
     * @param int $t Timestamp indicating when the trading interval opened
     *
     * @return $this
     */
    public function setT($t)
    {
        $this->container['t'] = $t;

        return $this;
    }

    /**
     * Gets o
     *
     * @return double
     */
    public function getO()
    {
        return $this->container['o'];
    }

    /**
     * Sets o
     *
     * @param double $o Price at the opening of the trading interval
     *
     * @return $this
     */
    public function setO($o)
    {
        $this->container['o'] = $o;

        return $this;
    }

    /**
     * Gets h
     *
     * @return double
     */
    public function getH()
    {
        return $this->container['h'];
    }

    /**
     * Sets h
     *
     * @param double $h Highest price reached during the trading interval
     *
     * @return $this
     */
    public function setH($h)
    {
        $this->container['h'] = $h;

        return $this;
    }

    /**
     * Gets l
     *
     * @return double
     */
    public function getL()
    {
        return $this->container['l'];
    }

    /**
     * Sets l
     *
     * @param double $l Lowest price reached during the trading interval
     *
     * @return $this
     */
    public function setL($l)
    {
        $this->container['l'] = $l;

        return $this;
    }

    /**
     * Gets c
     *
     * @return double
     */
    public function getC()
    {
        return $this->container['c'];
    }

    /**
     * Sets c
     *
     * @param double $c Closing price at the end of the trading interval
     *
     * @return $this
     */
    public function setC($c)
    {
        $this->container['c'] = $c;

        return $this;
    }

    /**
     * Gets tr
     *
     * @return double
     */
    public function getTr()
    {
        return $this->container['tr'];
    }

    /**
     * Sets tr
     *
     * @param double $tr Trades
     *
     * @return $this
     */
    public function setTr($tr)
    {
        $this->container['tr'] = $tr;

        return $this;
    }

    /**
     * Gets bv
     *
     * @return double
     */
    public function getBv()
    {
        return $this->container['bv'];
    }

    /**
     * Sets bv
     *
     * @param double $bv Trading base volume recorded during the trading interval
     *
     * @return $this
     */
    public function setBv($bv)
    {
        $this->container['bv'] = $bv;

        return $this;
    }

    /**
     * Gets qv
     *
     * @return double
     */
    public function getQv()
    {
        return $this->container['qv'];
    }

    /**
     * Sets qv
     *
     * @param double $qv Trading quote volume recorded during the trading interval
     *
     * @return $this
     */
    public function setQv($qv)
    {
        $this->container['qv'] = $qv;

        return $this;
    }

    /**
     * Gets tbv
     *
     * @return double
     */
    public function getTbv()
    {
        return $this->container['tbv'];
    }

    /**
     * Sets tbv
     *
     * @param double $tbv Taker buy base asset volume recorded during the trading interval
     *
     * @return $this
     */
    public function setTbv($tbv)
    {
        $this->container['tbv'] = $tbv;

        return $this;
    }

    /**
     * Gets tqv
     *
     * @return double
     */
    public function getTqv()
    {
        return $this->container['tqv'];
    }

    /**
     * Sets tqv
     *
     * @param double $tqv Taker buy quote asset volume recorded during the trading interval
     *
     * @return $this
     */
    public function setTqv($tqv)
    {
        $this->container['tqv'] = $tqv;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
