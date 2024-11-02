<?php
declare(strict_types=1);

namespace AlphaVantage\Http;

use AlphaVantage\Exception\AlphaVantageException;

/**
 * Class CurlHttpClient
 *
 * A simple HTTP client implementation using cURL.
 */
class CurlHttpClient implements HttpClientInterface
{
    /**
     * {@inheritDoc}
     *
     * @throws AlphaVantageException on network or HTTP errors.
     */
    public function get(string $url, array $params = []): string
    {
        $query = http_build_query($params);
        $fullUrl = $url . '?' . $query;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $fullUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $errorMsg = curl_error($ch);
            curl_close($ch);
            throw new AlphaVantageException('cURL error: ' . $errorMsg);
        }

        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpStatus !== 200) {
            throw new AlphaVantageException('HTTP error: ' . $httpStatus);
        }

        return $response;
    }
}
