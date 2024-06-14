<?php
/**
 * IPOItem
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
 * IPOItem Class Doc Comment
 *
 * @category Class
 * @description IPOItem represents an IPO item
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class IPOItem implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'IPOItem';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'currency' => 'string',
        'date' => 'string',
        'deal_status' => 'string',
        'description' => 'string',
        'initial_filing_date' => 'string',
        'insider_lockup_date' => 'string',
        'insider_lockup_days' => 'int',
        'ipo_type' => 'string',
        'last_yr_income' => 'double',
        'last_yr_income_year' => 'double',
        'last_yr_revenue' => 'double',
        'last_yr_revenue_year' => 'double',
        'lead_underwriters' => 'string[]',
        'market_cap_at_offer' => 'double',
        'mic' => 'string',
        'name' => 'string',
        'notes' => 'string',
        'offering_shares' => 'double',
        'offering_shares_ord_adr' => 'double',
        'offering_value' => 'double',
        'open_date_verified' => 'bool',
        'ord_shares_out_after_offer' => 'double',
        'other_underwriters' => 'string[]',
        'price_max' => 'double',
        'price_min' => 'double',
        'price_open' => 'double',
        'price_public_offering' => 'double',
        'pricing_date' => 'string',
        'record_id' => 'string',
        'sec_accession_number' => 'string',
        'sec_filing_url' => 'string',
        'shares_outstanding' => 'double',
        'sic' => 'double',
        'spac_converted_to_target' => 'bool',
        'state_location' => 'string',
        'ticker' => 'string',
        'time' => 'string',
        'underwriter_quiet_expiration_date' => 'string',
        'underwriter_quiet_expiration_days' => 'int',
        'updated' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'currency' => null,
        'date' => null,
        'deal_status' => null,
        'description' => null,
        'initial_filing_date' => null,
        'insider_lockup_date' => null,
        'insider_lockup_days' => 'int64',
        'ipo_type' => null,
        'last_yr_income' => 'double',
        'last_yr_income_year' => 'double',
        'last_yr_revenue' => 'double',
        'last_yr_revenue_year' => 'double',
        'lead_underwriters' => null,
        'market_cap_at_offer' => 'double',
        'mic' => null,
        'name' => null,
        'notes' => null,
        'offering_shares' => 'double',
        'offering_shares_ord_adr' => 'double',
        'offering_value' => 'double',
        'open_date_verified' => null,
        'ord_shares_out_after_offer' => 'double',
        'other_underwriters' => null,
        'price_max' => 'double',
        'price_min' => 'double',
        'price_open' => 'double',
        'price_public_offering' => 'double',
        'pricing_date' => null,
        'record_id' => null,
        'sec_accession_number' => null,
        'sec_filing_url' => null,
        'shares_outstanding' => 'double',
        'sic' => 'double',
        'spac_converted_to_target' => null,
        'state_location' => null,
        'ticker' => null,
        'time' => null,
        'underwriter_quiet_expiration_date' => null,
        'underwriter_quiet_expiration_days' => 'int64',
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
        'date' => 'date',
        'deal_status' => 'deal_status',
        'description' => 'description',
        'initial_filing_date' => 'initial_filing_date',
        'insider_lockup_date' => 'insider_lockup_date',
        'insider_lockup_days' => 'insider_lockup_days',
        'ipo_type' => 'ipo_type',
        'last_yr_income' => 'last_yr_income',
        'last_yr_income_year' => 'last_yr_income_year',
        'last_yr_revenue' => 'last_yr_revenue',
        'last_yr_revenue_year' => 'last_yr_revenue_year',
        'lead_underwriters' => 'lead_underwriters',
        'market_cap_at_offer' => 'market_cap_at_offer',
        'mic' => 'mic',
        'name' => 'name',
        'notes' => 'notes',
        'offering_shares' => 'offering_shares',
        'offering_shares_ord_adr' => 'offering_shares_ord_adr',
        'offering_value' => 'offering_value',
        'open_date_verified' => 'open_date_verified',
        'ord_shares_out_after_offer' => 'ord_shares_out_after_offer',
        'other_underwriters' => 'other_underwriters',
        'price_max' => 'price_max',
        'price_min' => 'price_min',
        'price_open' => 'price_open',
        'price_public_offering' => 'price_public_offering',
        'pricing_date' => 'pricing_date',
        'record_id' => 'record_id',
        'sec_accession_number' => 'sec_accession_number',
        'sec_filing_url' => 'sec_filing_url',
        'shares_outstanding' => 'shares_outstanding',
        'sic' => 'sic',
        'spac_converted_to_target' => 'spac_converted_to_target',
        'state_location' => 'state_location',
        'ticker' => 'ticker',
        'time' => 'time',
        'underwriter_quiet_expiration_date' => 'underwriter_quiet_expiration_date',
        'underwriter_quiet_expiration_days' => 'underwriter_quiet_expiration_days',
        'updated' => 'updated'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'currency' => 'setCurrency',
        'date' => 'setDate',
        'deal_status' => 'setDealStatus',
        'description' => 'setDescription',
        'initial_filing_date' => 'setInitialFilingDate',
        'insider_lockup_date' => 'setInsiderLockupDate',
        'insider_lockup_days' => 'setInsiderLockupDays',
        'ipo_type' => 'setIpoType',
        'last_yr_income' => 'setLastYrIncome',
        'last_yr_income_year' => 'setLastYrIncomeYear',
        'last_yr_revenue' => 'setLastYrRevenue',
        'last_yr_revenue_year' => 'setLastYrRevenueYear',
        'lead_underwriters' => 'setLeadUnderwriters',
        'market_cap_at_offer' => 'setMarketCapAtOffer',
        'mic' => 'setMic',
        'name' => 'setName',
        'notes' => 'setNotes',
        'offering_shares' => 'setOfferingShares',
        'offering_shares_ord_adr' => 'setOfferingSharesOrdAdr',
        'offering_value' => 'setOfferingValue',
        'open_date_verified' => 'setOpenDateVerified',
        'ord_shares_out_after_offer' => 'setOrdSharesOutAfterOffer',
        'other_underwriters' => 'setOtherUnderwriters',
        'price_max' => 'setPriceMax',
        'price_min' => 'setPriceMin',
        'price_open' => 'setPriceOpen',
        'price_public_offering' => 'setPricePublicOffering',
        'pricing_date' => 'setPricingDate',
        'record_id' => 'setRecordId',
        'sec_accession_number' => 'setSecAccessionNumber',
        'sec_filing_url' => 'setSecFilingUrl',
        'shares_outstanding' => 'setSharesOutstanding',
        'sic' => 'setSic',
        'spac_converted_to_target' => 'setSpacConvertedToTarget',
        'state_location' => 'setStateLocation',
        'ticker' => 'setTicker',
        'time' => 'setTime',
        'underwriter_quiet_expiration_date' => 'setUnderwriterQuietExpirationDate',
        'underwriter_quiet_expiration_days' => 'setUnderwriterQuietExpirationDays',
        'updated' => 'setUpdated'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'currency' => 'getCurrency',
        'date' => 'getDate',
        'deal_status' => 'getDealStatus',
        'description' => 'getDescription',
        'initial_filing_date' => 'getInitialFilingDate',
        'insider_lockup_date' => 'getInsiderLockupDate',
        'insider_lockup_days' => 'getInsiderLockupDays',
        'ipo_type' => 'getIpoType',
        'last_yr_income' => 'getLastYrIncome',
        'last_yr_income_year' => 'getLastYrIncomeYear',
        'last_yr_revenue' => 'getLastYrRevenue',
        'last_yr_revenue_year' => 'getLastYrRevenueYear',
        'lead_underwriters' => 'getLeadUnderwriters',
        'market_cap_at_offer' => 'getMarketCapAtOffer',
        'mic' => 'getMic',
        'name' => 'getName',
        'notes' => 'getNotes',
        'offering_shares' => 'getOfferingShares',
        'offering_shares_ord_adr' => 'getOfferingSharesOrdAdr',
        'offering_value' => 'getOfferingValue',
        'open_date_verified' => 'getOpenDateVerified',
        'ord_shares_out_after_offer' => 'getOrdSharesOutAfterOffer',
        'other_underwriters' => 'getOtherUnderwriters',
        'price_max' => 'getPriceMax',
        'price_min' => 'getPriceMin',
        'price_open' => 'getPriceOpen',
        'price_public_offering' => 'getPricePublicOffering',
        'pricing_date' => 'getPricingDate',
        'record_id' => 'getRecordId',
        'sec_accession_number' => 'getSecAccessionNumber',
        'sec_filing_url' => 'getSecFilingUrl',
        'shares_outstanding' => 'getSharesOutstanding',
        'sic' => 'getSic',
        'spac_converted_to_target' => 'getSpacConvertedToTarget',
        'state_location' => 'getStateLocation',
        'ticker' => 'getTicker',
        'time' => 'getTime',
        'underwriter_quiet_expiration_date' => 'getUnderwriterQuietExpirationDate',
        'underwriter_quiet_expiration_days' => 'getUnderwriterQuietExpirationDays',
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
        $this->container['date'] = isset($data['date']) ? $data['date'] : null;
        $this->container['deal_status'] = isset($data['deal_status']) ? $data['deal_status'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['initial_filing_date'] = isset($data['initial_filing_date']) ? $data['initial_filing_date'] : null;
        $this->container['insider_lockup_date'] = isset($data['insider_lockup_date']) ? $data['insider_lockup_date'] : null;
        $this->container['insider_lockup_days'] = isset($data['insider_lockup_days']) ? $data['insider_lockup_days'] : null;
        $this->container['ipo_type'] = isset($data['ipo_type']) ? $data['ipo_type'] : null;
        $this->container['last_yr_income'] = isset($data['last_yr_income']) ? $data['last_yr_income'] : null;
        $this->container['last_yr_income_year'] = isset($data['last_yr_income_year']) ? $data['last_yr_income_year'] : null;
        $this->container['last_yr_revenue'] = isset($data['last_yr_revenue']) ? $data['last_yr_revenue'] : null;
        $this->container['last_yr_revenue_year'] = isset($data['last_yr_revenue_year']) ? $data['last_yr_revenue_year'] : null;
        $this->container['lead_underwriters'] = isset($data['lead_underwriters']) ? $data['lead_underwriters'] : null;
        $this->container['market_cap_at_offer'] = isset($data['market_cap_at_offer']) ? $data['market_cap_at_offer'] : null;
        $this->container['mic'] = isset($data['mic']) ? $data['mic'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['notes'] = isset($data['notes']) ? $data['notes'] : null;
        $this->container['offering_shares'] = isset($data['offering_shares']) ? $data['offering_shares'] : null;
        $this->container['offering_shares_ord_adr'] = isset($data['offering_shares_ord_adr']) ? $data['offering_shares_ord_adr'] : null;
        $this->container['offering_value'] = isset($data['offering_value']) ? $data['offering_value'] : null;
        $this->container['open_date_verified'] = isset($data['open_date_verified']) ? $data['open_date_verified'] : null;
        $this->container['ord_shares_out_after_offer'] = isset($data['ord_shares_out_after_offer']) ? $data['ord_shares_out_after_offer'] : null;
        $this->container['other_underwriters'] = isset($data['other_underwriters']) ? $data['other_underwriters'] : null;
        $this->container['price_max'] = isset($data['price_max']) ? $data['price_max'] : null;
        $this->container['price_min'] = isset($data['price_min']) ? $data['price_min'] : null;
        $this->container['price_open'] = isset($data['price_open']) ? $data['price_open'] : null;
        $this->container['price_public_offering'] = isset($data['price_public_offering']) ? $data['price_public_offering'] : null;
        $this->container['pricing_date'] = isset($data['pricing_date']) ? $data['pricing_date'] : null;
        $this->container['record_id'] = isset($data['record_id']) ? $data['record_id'] : null;
        $this->container['sec_accession_number'] = isset($data['sec_accession_number']) ? $data['sec_accession_number'] : null;
        $this->container['sec_filing_url'] = isset($data['sec_filing_url']) ? $data['sec_filing_url'] : null;
        $this->container['shares_outstanding'] = isset($data['shares_outstanding']) ? $data['shares_outstanding'] : null;
        $this->container['sic'] = isset($data['sic']) ? $data['sic'] : null;
        $this->container['spac_converted_to_target'] = isset($data['spac_converted_to_target']) ? $data['spac_converted_to_target'] : null;
        $this->container['state_location'] = isset($data['state_location']) ? $data['state_location'] : null;
        $this->container['ticker'] = isset($data['ticker']) ? $data['ticker'] : null;
        $this->container['time'] = isset($data['time']) ? $data['time'] : null;
        $this->container['underwriter_quiet_expiration_date'] = isset($data['underwriter_quiet_expiration_date']) ? $data['underwriter_quiet_expiration_date'] : null;
        $this->container['underwriter_quiet_expiration_days'] = isset($data['underwriter_quiet_expiration_days']) ? $data['underwriter_quiet_expiration_days'] : null;
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
     * Gets date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->container['date'];
    }

    /**
     * Sets date
     *
     * @param string $date Date when earnings are disbursed
     *
     * @return $this
     */
    public function setDate($date)
    {
        $this->container['date'] = $date;

        return $this;
    }

    /**
     * Gets deal_status
     *
     * @return string
     */
    public function getDealStatus()
    {
        return $this->container['deal_status'];
    }

    /**
     * Sets deal_status
     *
     * @param string $deal_status Activity tracked for the IPO status
     *
     * @return $this
     */
    public function setDealStatus($deal_status)
    {
        $this->container['deal_status'] = $deal_status;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string $description Description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets initial_filing_date
     *
     * @return string
     */
    public function getInitialFilingDate()
    {
        return $this->container['initial_filing_date'];
    }

    /**
     * Sets initial_filing_date
     *
     * @param string $initial_filing_date Initial filing date
     *
     * @return $this
     */
    public function setInitialFilingDate($initial_filing_date)
    {
        $this->container['initial_filing_date'] = $initial_filing_date;

        return $this;
    }

    /**
     * Gets insider_lockup_date
     *
     * @return string
     */
    public function getInsiderLockupDate()
    {
        return $this->container['insider_lockup_date'];
    }

    /**
     * Sets insider_lockup_date
     *
     * @param string $insider_lockup_date Date range that represents the insider lock up period
     *
     * @return $this
     */
    public function setInsiderLockupDate($insider_lockup_date)
    {
        $this->container['insider_lockup_date'] = $insider_lockup_date;

        return $this;
    }

    /**
     * Gets insider_lockup_days
     *
     * @return int
     */
    public function getInsiderLockupDays()
    {
        return $this->container['insider_lockup_days'];
    }

    /**
     * Sets insider_lockup_days
     *
     * @param int $insider_lockup_days Amount of days for the insider lockup period
     *
     * @return $this
     */
    public function setInsiderLockupDays($insider_lockup_days)
    {
        $this->container['insider_lockup_days'] = $insider_lockup_days;

        return $this;
    }

    /**
     * Gets ipo_type
     *
     * @return string
     */
    public function getIpoType()
    {
        return $this->container['ipo_type'];
    }

    /**
     * Sets ipo_type
     *
     * @param string $ipo_type IPO type
     *
     * @return $this
     */
    public function setIpoType($ipo_type)
    {
        $this->container['ipo_type'] = $ipo_type;

        return $this;
    }

    /**
     * Gets last_yr_income
     *
     * @return double
     */
    public function getLastYrIncome()
    {
        return $this->container['last_yr_income'];
    }

    /**
     * Sets last_yr_income
     *
     * @param double $last_yr_income Last year income
     *
     * @return $this
     */
    public function setLastYrIncome($last_yr_income)
    {
        $this->container['last_yr_income'] = $last_yr_income;

        return $this;
    }

    /**
     * Gets last_yr_income_year
     *
     * @return double
     */
    public function getLastYrIncomeYear()
    {
        return $this->container['last_yr_income_year'];
    }

    /**
     * Sets last_yr_income_year
     *
     * @param double $last_yr_income_year Last year income
     *
     * @return $this
     */
    public function setLastYrIncomeYear($last_yr_income_year)
    {
        $this->container['last_yr_income_year'] = $last_yr_income_year;

        return $this;
    }

    /**
     * Gets last_yr_revenue
     *
     * @return double
     */
    public function getLastYrRevenue()
    {
        return $this->container['last_yr_revenue'];
    }

    /**
     * Sets last_yr_revenue
     *
     * @param double $last_yr_revenue Last year revenue
     *
     * @return $this
     */
    public function setLastYrRevenue($last_yr_revenue)
    {
        $this->container['last_yr_revenue'] = $last_yr_revenue;

        return $this;
    }

    /**
     * Gets last_yr_revenue_year
     *
     * @return double
     */
    public function getLastYrRevenueYear()
    {
        return $this->container['last_yr_revenue_year'];
    }

    /**
     * Sets last_yr_revenue_year
     *
     * @param double $last_yr_revenue_year Last year revenue
     *
     * @return $this
     */
    public function setLastYrRevenueYear($last_yr_revenue_year)
    {
        $this->container['last_yr_revenue_year'] = $last_yr_revenue_year;

        return $this;
    }

    /**
     * Gets lead_underwriters
     *
     * @return string[]
     */
    public function getLeadUnderwriters()
    {
        return $this->container['lead_underwriters'];
    }

    /**
     * Sets lead_underwriters
     *
     * @param string[] $lead_underwriters Firm that lead the underwriting process
     *
     * @return $this
     */
    public function setLeadUnderwriters($lead_underwriters)
    {
        $this->container['lead_underwriters'] = $lead_underwriters;

        return $this;
    }

    /**
     * Gets market_cap_at_offer
     *
     * @return double
     */
    public function getMarketCapAtOffer()
    {
        return $this->container['market_cap_at_offer'];
    }

    /**
     * Sets market_cap_at_offer
     *
     * @param double $market_cap_at_offer Market cap at offer
     *
     * @return $this
     */
    public function setMarketCapAtOffer($market_cap_at_offer)
    {
        $this->container['market_cap_at_offer'] = $market_cap_at_offer;

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
     * Gets offering_shares
     *
     * @return double
     */
    public function getOfferingShares()
    {
        return $this->container['offering_shares'];
    }

    /**
     * Sets offering_shares
     *
     * @param double $offering_shares Amount of shares being offered
     *
     * @return $this
     */
    public function setOfferingShares($offering_shares)
    {
        $this->container['offering_shares'] = $offering_shares;

        return $this;
    }

    /**
     * Gets offering_shares_ord_adr
     *
     * @return double
     */
    public function getOfferingSharesOrdAdr()
    {
        return $this->container['offering_shares_ord_adr'];
    }

    /**
     * Sets offering_shares_ord_adr
     *
     * @param double $offering_shares_ord_adr Amount of ordinary shares being offered
     *
     * @return $this
     */
    public function setOfferingSharesOrdAdr($offering_shares_ord_adr)
    {
        $this->container['offering_shares_ord_adr'] = $offering_shares_ord_adr;

        return $this;
    }

    /**
     * Gets offering_value
     *
     * @return double
     */
    public function getOfferingValue()
    {
        return $this->container['offering_value'];
    }

    /**
     * Sets offering_value
     *
     * @param double $offering_value Number of shares being offered x price per share
     *
     * @return $this
     */
    public function setOfferingValue($offering_value)
    {
        $this->container['offering_value'] = $offering_value;

        return $this;
    }

    /**
     * Gets open_date_verified
     *
     * @return bool
     */
    public function getOpenDateVerified()
    {
        return $this->container['open_date_verified'];
    }

    /**
     * Sets open_date_verified
     *
     * @param bool $open_date_verified Indicates if the predicted date has been verified by the company
     *
     * @return $this
     */
    public function setOpenDateVerified($open_date_verified)
    {
        $this->container['open_date_verified'] = $open_date_verified;

        return $this;
    }

    /**
     * Gets ord_shares_out_after_offer
     *
     * @return double
     */
    public function getOrdSharesOutAfterOffer()
    {
        return $this->container['ord_shares_out_after_offer'];
    }

    /**
     * Sets ord_shares_out_after_offer
     *
     * @param double $ord_shares_out_after_offer Ordinary shares out after offer
     *
     * @return $this
     */
    public function setOrdSharesOutAfterOffer($ord_shares_out_after_offer)
    {
        $this->container['ord_shares_out_after_offer'] = $ord_shares_out_after_offer;

        return $this;
    }

    /**
     * Gets other_underwriters
     *
     * @return string[]
     */
    public function getOtherUnderwriters()
    {
        return $this->container['other_underwriters'];
    }

    /**
     * Sets other_underwriters
     *
     * @param string[] $other_underwriters Additional firms that were a part of the underwriting
     *
     * @return $this
     */
    public function setOtherUnderwriters($other_underwriters)
    {
        $this->container['other_underwriters'] = $other_underwriters;

        return $this;
    }

    /**
     * Gets price_max
     *
     * @return double
     */
    public function getPriceMax()
    {
        return $this->container['price_max'];
    }

    /**
     * Sets price_max
     *
     * @param double $price_max Maximum projected IPO price range
     *
     * @return $this
     */
    public function setPriceMax($price_max)
    {
        $this->container['price_max'] = $price_max;

        return $this;
    }

    /**
     * Gets price_min
     *
     * @return double
     */
    public function getPriceMin()
    {
        return $this->container['price_min'];
    }

    /**
     * Sets price_min
     *
     * @param double $price_min Minimum  projected IPO price range
     *
     * @return $this
     */
    public function setPriceMin($price_min)
    {
        $this->container['price_min'] = $price_min;

        return $this;
    }

    /**
     * Gets price_open
     *
     * @return double
     */
    public function getPriceOpen()
    {
        return $this->container['price_open'];
    }

    /**
     * Sets price_open
     *
     * @param double $price_open The opening price at the beginning of the first trading day (only available for priced IPOs)
     *
     * @return $this
     */
    public function setPriceOpen($price_open)
    {
        $this->container['price_open'] = $price_open;

        return $this;
    }

    /**
     * Gets price_public_offering
     *
     * @return double
     */
    public function getPricePublicOffering()
    {
        return $this->container['price_public_offering'];
    }

    /**
     * Sets price_public_offering
     *
     * @param double $price_public_offering Public offering price
     *
     * @return $this
     */
    public function setPricePublicOffering($price_public_offering)
    {
        $this->container['price_public_offering'] = $price_public_offering;

        return $this;
    }

    /**
     * Gets pricing_date
     *
     * @return string
     */
    public function getPricingDate()
    {
        return $this->container['pricing_date'];
    }

    /**
     * Sets pricing_date
     *
     * @param string $pricing_date Pricing date
     *
     * @return $this
     */
    public function setPricingDate($pricing_date)
    {
        $this->container['pricing_date'] = $pricing_date;

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
     * Gets sec_accession_number
     *
     * @return string
     */
    public function getSecAccessionNumber()
    {
        return $this->container['sec_accession_number'];
    }

    /**
     * Sets sec_accession_number
     *
     * @param string $sec_accession_number SEC accession number
     *
     * @return $this
     */
    public function setSecAccessionNumber($sec_accession_number)
    {
        $this->container['sec_accession_number'] = $sec_accession_number;

        return $this;
    }

    /**
     * Gets sec_filing_url
     *
     * @return string
     */
    public function getSecFilingUrl()
    {
        return $this->container['sec_filing_url'];
    }

    /**
     * Sets sec_filing_url
     *
     * @param string $sec_filing_url The IRL to the company's S-1, S-1/A, F-1, or F-1/A SEC filing, which is required to be filed before an IPO takes place.
     *
     * @return $this
     */
    public function setSecFilingUrl($sec_filing_url)
    {
        $this->container['sec_filing_url'] = $sec_filing_url;

        return $this;
    }

    /**
     * Gets shares_outstanding
     *
     * @return double
     */
    public function getSharesOutstanding()
    {
        return $this->container['shares_outstanding'];
    }

    /**
     * Sets shares_outstanding
     *
     * @param double $shares_outstanding Outstanding shares
     *
     * @return $this
     */
    public function setSharesOutstanding($shares_outstanding)
    {
        $this->container['shares_outstanding'] = $shares_outstanding;

        return $this;
    }

    /**
     * Gets sic
     *
     * @return double
     */
    public function getSic()
    {
        return $this->container['sic'];
    }

    /**
     * Sets sic
     *
     * @param double $sic SIC
     *
     * @return $this
     */
    public function setSic($sic)
    {
        $this->container['sic'] = $sic;

        return $this;
    }

    /**
     * Gets spac_converted_to_target
     *
     * @return bool
     */
    public function getSpacConvertedToTarget()
    {
        return $this->container['spac_converted_to_target'];
    }

    /**
     * Sets spac_converted_to_target
     *
     * @param bool $spac_converted_to_target ISs Spac converted to target
     *
     * @return $this
     */
    public function setSpacConvertedToTarget($spac_converted_to_target)
    {
        $this->container['spac_converted_to_target'] = $spac_converted_to_target;

        return $this;
    }

    /**
     * Gets state_location
     *
     * @return string
     */
    public function getStateLocation()
    {
        return $this->container['state_location'];
    }

    /**
     * Sets state_location
     *
     * @param string $state_location State location
     *
     * @return $this
     */
    public function setStateLocation($state_location)
    {
        $this->container['state_location'] = $state_location;

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
     * Gets time
     *
     * @return string
     */
    public function getTime()
    {
        return $this->container['time'];
    }

    /**
     * Sets time
     *
     * @param string $time Time when earnings are disbursed
     *
     * @return $this
     */
    public function setTime($time)
    {
        $this->container['time'] = $time;

        return $this;
    }

    /**
     * Gets underwriter_quiet_expiration_date
     *
     * @return string
     */
    public function getUnderwriterQuietExpirationDate()
    {
        return $this->container['underwriter_quiet_expiration_date'];
    }

    /**
     * Sets underwriter_quiet_expiration_date
     *
     * @param string $underwriter_quiet_expiration_date Date of expiration for the underwriter quiet period
     *
     * @return $this
     */
    public function setUnderwriterQuietExpirationDate($underwriter_quiet_expiration_date)
    {
        $this->container['underwriter_quiet_expiration_date'] = $underwriter_quiet_expiration_date;

        return $this;
    }

    /**
     * Gets underwriter_quiet_expiration_days
     *
     * @return int
     */
    public function getUnderwriterQuietExpirationDays()
    {
        return $this->container['underwriter_quiet_expiration_days'];
    }

    /**
     * Sets underwriter_quiet_expiration_days
     *
     * @param int $underwriter_quiet_expiration_days Days of expiration for the underwriter quiet period
     *
     * @return $this
     */
    public function setUnderwriterQuietExpirationDays($underwriter_quiet_expiration_days)
    {
        $this->container['underwriter_quiet_expiration_days'] = $underwriter_quiet_expiration_days;

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
