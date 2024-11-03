<?php
declare(strict_types=1);

namespace AlphaVantage\Endpoints;

use AlphaVantage\Http\HttpClientInterface;
use AlphaVantage\Exception\ApiException;

/**
 * Base class for all API endpoint implementations.
 */
abstract class AbstractEndpoint
{
    protected string $apiKey;
    protected HttpClientInterface $httpClient;
    protected string $baseUri;

    /**
     * @param string $apiKey
     * @param HttpClientInterface $httpClient
     * @param string $baseUri
     */
    public function __construct(string $apiKey, HttpClientInterface $httpClient, string $baseUri)
    {
        $this->apiKey    = $apiKey;
        $this->httpClient = $httpClient;
        $this->baseUri   = $baseUri;
    }

    /**
     * Execute an API request.
     *
     * @param array $params
     * @return array
     * @throws ApiException
     */
    protected function request(array $params): array
    {
        $params['apikey'] = $this->apiKey;

        $response = $this->httpClient->get($this->baseUri, $params);
        $data = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new ApiException('Invalid JSON response');
        }

        // Handle API error messages
        if (isset($data['Error Message'])) {
            throw new ApiException($data['Error Message']);
        }
        if (isset($data['Note'])) {
            throw new ApiException($data['Note']);
        }

        return $data;
    }
}
