<?php
/**
 * DividendsCalendarItem
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
 * DividendsCalendarItem Class Doc Comment
 *
 * @category Class
 * @description DividendsCalendarItem represents a dividends calendar item from Benzinga
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DividendsCalendarItem implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DividendsCalendarItem';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'currency' => 'string',
        'declaration_date' => 'string',
        'dividend' => 'double',
        'dividend_prior' => 'string',
        'dividend_type' => 'string',
        'dividend_yield' => 'double',
        'end_regular_dividend' => 'bool',
        'ex_dividend_date' => 'string',
        'frequency' => 'int',
        'importance' => 'int',
        'mic' => 'string',
        'name' => 'string',
        'notes' => 'string',
        'payable_date' => 'string',
        'record_date' => 'string',
        'record_id' => 'string',
        'ticker' => 'string',
        'updated' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'currency' => null,
        'declaration_date' => null,
        'dividend' => 'double',
        'dividend_prior' => null,
        'dividend_type' => null,
        'dividend_yield' => 'double',
        'end_regular_dividend' => null,
        'ex_dividend_date' => null,
        'frequency' => 'int64',
        'importance' => 'int64',
        'mic' => null,
        'name' => null,
        'notes' => null,
        'payable_date' => null,
        'record_date' => null,
        'record_id' => null,
        'ticker' => null,
        'updated' => 'int64'
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
        'currency' => 'currency',
        'declaration_date' => 'declaration_date',
        'dividend' => 'dividend',
        'dividend_prior' => 'dividend_prior',
        'dividend_type' => 'dividend_type',
        'dividend_yield' => 'dividend_yield',
        'end_regular_dividend' => 'end_regular_dividend',
        'ex_dividend_date' => 'ex_dividend_date',
        'frequency' => 'frequency',
        'importance' => 'importance',
        'mic' => 'mic',
        'name' => 'name',
        'notes' => 'notes',
        'payable_date' => 'payable_date',
        'record_date' => 'record_date',
        'record_id' => 'record_id',
        'ticker' => 'ticker',
        'updated' => 'updated'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'currency' => 'setCurrency',
        'declaration_date' => 'setDeclarationDate',
        'dividend' => 'setDividend',
        'dividend_prior' => 'setDividendPrior',
        'dividend_type' => 'setDividendType',
        'dividend_yield' => 'setDividendYield',
        'end_regular_dividend' => 'setEndRegularDividend',
        'ex_dividend_date' => 'setExDividendDate',
        'frequency' => 'setFrequency',
        'importance' => 'setImportance',
        'mic' => 'setMic',
        'name' => 'setName',
        'notes' => 'setNotes',
        'payable_date' => 'setPayableDate',
        'record_date' => 'setRecordDate',
        'record_id' => 'setRecordId',
        'ticker' => 'setTicker',
        'updated' => 'setUpdated'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'currency' => 'getCurrency',
        'declaration_date' => 'getDeclarationDate',
        'dividend' => 'getDividend',
        'dividend_prior' => 'getDividendPrior',
        'dividend_type' => 'getDividendType',
        'dividend_yield' => 'getDividendYield',
        'end_regular_dividend' => 'getEndRegularDividend',
        'ex_dividend_date' => 'getExDividendDate',
        'frequency' => 'getFrequency',
        'importance' => 'getImportance',
        'mic' => 'getMic',
        'name' => 'getName',
        'notes' => 'getNotes',
        'payable_date' => 'getPayableDate',
        'record_date' => 'getRecordDate',
        'record_id' => 'getRecordId',
        'ticker' => 'getTicker',
        'updated' => 'getUpdated'
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
        $this->container['currency'] = isset($data['currency']) ? $data['currency'] : null;
        $this->container['declaration_date'] = isset($data['declaration_date']) ? $data['declaration_date'] : null;
        $this->container['dividend'] = isset($data['dividend']) ? $data['dividend'] : null;
        $this->container['dividend_prior'] = isset($data['dividend_prior']) ? $data['dividend_prior'] : null;
        $this->container['dividend_type'] = isset($data['dividend_type']) ? $data['dividend_type'] : null;
        $this->container['dividend_yield'] = isset($data['dividend_yield']) ? $data['dividend_yield'] : null;
        $this->container['end_regular_dividend'] = isset($data['end_regular_dividend']) ? $data['end_regular_dividend'] : null;
        $this->container['ex_dividend_date'] = isset($data['ex_dividend_date']) ? $data['ex_dividend_date'] : null;
        $this->container['frequency'] = isset($data['frequency']) ? $data['frequency'] : null;
        $this->container['importance'] = isset($data['importance']) ? $data['importance'] : null;
        $this->container['mic'] = isset($data['mic']) ? $data['mic'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['notes'] = isset($data['notes']) ? $data['notes'] : null;
        $this->container['payable_date'] = isset($data['payable_date']) ? $data['payable_date'] : null;
        $this->container['record_date'] = isset($data['record_date']) ? $data['record_date'] : null;
        $this->container['record_id'] = isset($data['record_id']) ? $data['record_id'] : null;
        $this->container['ticker'] = isset($data['ticker']) ? $data['ticker'] : null;
        $this->container['updated'] = isset($data['updated']) ? $data['updated'] : null;
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
     * Gets currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string $currency The currency code of the security according to the ISO 4217 standard
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets declaration_date
     *
     * @return string
     */
    public function getDeclarationDate()
    {
        return $this->container['declaration_date'];
    }

    /**
     * Sets declaration_date
     *
     * @param string $declaration_date Date of declaration
     *
     * @return $this
     */
    public function setDeclarationDate($declaration_date)
    {
        $this->container['declaration_date'] = $declaration_date;

        return $this;
    }

    /**
     * Gets dividend
     *
     * @return double
     */
    public function getDividend()
    {
        return $this->container['dividend'];
    }

    /**
     * Sets dividend
     *
     * @param double $dividend Dividend amount per share
     *
     * @return $this
     */
    public function setDividend($dividend)
    {
        $this->container['dividend'] = $dividend;

        return $this;
    }

    /**
     * Gets dividend_prior
     *
     * @return string
     */
    public function getDividendPrior()
    {
        return $this->container['dividend_prior'];
    }

    /**
     * Sets dividend_prior
     *
     * @param string $dividend_prior Dividend that was issued prior
     *
     * @return $this
     */
    public function setDividendPrior($dividend_prior)
    {
        $this->container['dividend_prior'] = $dividend_prior;

        return $this;
    }

    /**
     * Gets dividend_type
     *
     * @return string
     */
    public function getDividendType()
    {
        return $this->container['dividend_type'];
    }

    /**
     * Sets dividend_type
     *
     * @param string $dividend_type Type of issuance (Cash or Stock)
     *
     * @return $this
     */
    public function setDividendType($dividend_type)
    {
        $this->container['dividend_type'] = $dividend_type;

        return $this;
    }

    /**
     * Gets dividend_yield
     *
     * @return double
     */
    public function getDividendYield()
    {
        return $this->container['dividend_yield'];
    }

    /**
     * Sets dividend_yield
     *
     * @param double $dividend_yield Dividend expressed as a percentage of a current share price
     *
     * @return $this
     */
    public function setDividendYield($dividend_yield)
    {
        $this->container['dividend_yield'] = $dividend_yield;

        return $this;
    }

    /**
     * Gets end_regular_dividend
     *
     * @return bool
     */
    public function getEndRegularDividend()
    {
        return $this->container['end_regular_dividend'];
    }

    /**
     * Sets end_regular_dividend
     *
     * @param bool $end_regular_dividend End regular dividend
     *
     * @return $this
     */
    public function setEndRegularDividend($end_regular_dividend)
    {
        $this->container['end_regular_dividend'] = $end_regular_dividend;

        return $this;
    }

    /**
     * Gets ex_dividend_date
     *
     * @return string
     */
    public function getExDividendDate()
    {
        return $this->container['ex_dividend_date'];
    }

    /**
     * Sets ex_dividend_date
     *
     * @param string $ex_dividend_date Date of the ex-dividend
     *
     * @return $this
     */
    public function setExDividendDate($ex_dividend_date)
    {
        $this->container['ex_dividend_date'] = $ex_dividend_date;

        return $this;
    }

    /**
     * Gets frequency
     *
     * @return int
     */
    public function getFrequency()
    {
        return $this->container['frequency'];
    }

    /**
     * Sets frequency
     *
     * @param int $frequency Frequency of annual dividend distribution (4 signifies quarterly payments)
     *
     * @return $this
     */
    public function setFrequency($frequency)
    {
        $this->container['frequency'] = $frequency;

        return $this;
    }

    /**
     * Gets importance
     *
     * @return int
     */
    public function getImportance()
    {
        return $this->container['importance'];
    }

    /**
     * Sets importance
     *
     * @param int $importance Significance of the event
     *
     * @return $this
     */
    public function setImportance($importance)
    {
        $this->container['importance'] = $importance;

        return $this;
    }

    /**
     * Gets mic
     *
     * @return string
     */
    public function getMic()
    {
        return $this->container['mic'];
    }

    /**
     * Sets mic
     *
     * @param string $mic Market identifier code (MIC) under ISO 10383 standard
     *
     * @return $this
     */
    public function setMic($mic)
    {
        $this->container['mic'] = $mic;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name Full name of the instrument
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->container['notes'];
    }

    /**
     * Sets notes
     *
     * @param string $notes Notes
     *
     * @return $this
     */
    public function setNotes($notes)
    {
        $this->container['notes'] = $notes;

        return $this;
    }

    /**
     * Gets payable_date
     *
     * @return string
     */
    public function getPayableDate()
    {
        return $this->container['payable_date'];
    }

    /**
     * Sets payable_date
     *
     * @param string $payable_date Date of the payable dividend
     *
     * @return $this
     */
    public function setPayableDate($payable_date)
    {
        $this->container['payable_date'] = $payable_date;

        return $this;
    }

    /**
     * Gets record_date
     *
     * @return string
     */
    public function getRecordDate()
    {
        return $this->container['record_date'];
    }

    /**
     * Sets record_date
     *
     * @param string $record_date Date of the record date
     *
     * @return $this
     */
    public function setRecordDate($record_date)
    {
        $this->container['record_date'] = $record_date;

        return $this;
    }

    /**
     * Gets record_id
     *
     * @return string
     */
    public function getRecordId()
    {
        return $this->container['record_id'];
    }

    /**
     * Sets record_id
     *
     * @param string $record_id Unique record ID from Benzinga
     *
     * @return $this
     */
    public function setRecordId($record_id)
    {
        $this->container['record_id'] = $record_id;

        return $this;
    }

    /**
     * Gets ticker
     *
     * @return string
     */
    public function getTicker()
    {
        return $this->container['ticker'];
    }

    /**
     * Sets ticker
     *
     * @param string $ticker Ticker symbol of the instrument
     *
     * @return $this
     */
    public function setTicker($ticker)
    {
        $this->container['ticker'] = $ticker;

        return $this;
    }

    /**
     * Gets updated
     *
     * @return int
     */
    public function getUpdated()
    {
        return $this->container['updated'];
    }

    /**
     * Sets updated
     *
     * @param int $updated Last updated timestamp (UNIX)
     *
     * @return $this
     */
    public function setUpdated($updated)
    {
        $this->container['updated'] = $updated;

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
