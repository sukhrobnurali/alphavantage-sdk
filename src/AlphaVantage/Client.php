<?php
declare(strict_types=1);

namespace AlphaVantage;

use AlphaVantage\Http\CurlHttpClient;
use AlphaVantage\Http\HttpClientInterface;
use AlphaVantage\Endpoints\TimeSeriesEndpoint;
use AlphaVantage\Endpoints\TechnicalIndicatorEndpoint;
use AlphaVantage\Endpoints\ForexEndpoint;
use AlphaVantage\Endpoints\CryptoEndpoint;

/**
 * Class Client
 *
 * Serves as the main entry point to access all Alpha Vantage API endpoints.
 */
class Client
{
    protected string $apiKey;
    protected HttpClientInterface $httpClient;
    protected string $baseUri = 'https://www.alphavantage.co/query';

    /**
     * Client constructor.
     *
     * @param string $apiKey Your Alpha Vantage API key.
     * @param HttpClientInterface|null $httpClient Optional HTTP client; defaults to CurlHttpClient.
     */
    public function __construct(string $apiKey, ?HttpClientInterface $httpClient = null)
    {
        $this->apiKey = $apiKey;
        $this->httpClient = $httpClient ?? new CurlHttpClient();
    }

    /**
     * Get access to Time Series endpoints.
     *
     * @return TimeSeriesEndpoint
     */
    public function timeSeries(): TimeSeriesEndpoint
    {
        return new TimeSeriesEndpoint($this->apiKey, $this->httpClient, $this->baseUri);
    }

    /**
     * Get access to Technical Indicator endpoints.
     *
     * @return TechnicalIndicatorEndpoint
     */
    public function technicalIndicator(): TechnicalIndicatorEndpoint
    {
        return new TechnicalIndicatorEndpoint($this->apiKey, $this->httpClient, $this->baseUri);
    }

    /**
     * Get access to Forex endpoints.
     *
     * @return ForexEndpoint
     */
    public function forex(): ForexEndpoint
    {
        return new ForexEndpoint($this->apiKey, $this->httpClient, $this->baseUri);
    }

    /**
     * Get access to Cryptocurrency endpoints.
     *
     * @return CryptoEndpoint
     */
    public function crypto(): CryptoEndpoint
    {
        return new CryptoEndpoint($this->apiKey, $this->httpClient, $this->baseUri);
    }
}
