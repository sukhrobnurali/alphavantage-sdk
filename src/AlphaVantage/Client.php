<?php
declare(strict_types=1);

namespace AlphaVantage;

use AlphaVantage\Http\CurlHttpClient;
use AlphaVantage\Http\HttpClientInterface;

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

}
