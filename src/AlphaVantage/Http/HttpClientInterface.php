<?php
declare(strict_types=1);

namespace AlphaVantage\Http;

/**
 * Interface HttpClientInterface
 *
 * Provides an abstraction for making HTTP requests.
 */
interface HttpClientInterface
{
    /**
     * Send a GET request.
     *
     * @param string $url The target URL.
     * @param array $params Query parameters.
     *
     * @return string The raw response body.
     */
    public function get(string $url, array $params = []): string;
}
