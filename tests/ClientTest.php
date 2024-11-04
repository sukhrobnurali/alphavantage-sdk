<?php
declare(strict_types=1);

namespace AlphaVantage\Tests;

use AlphaVantage\Exception\ApiException;
use PHPUnit\Framework\TestCase;
use AlphaVantage\Client;
use AlphaVantage\Http\HttpClientInterface;

/**
 * A simple mock HTTP client for testing.
 */
class MockHttpClient implements HttpClientInterface
{
    public string $response;

    public function __construct(string $response)
    {
        $this->response = $response;
    }

    public function get(string $url, array $params = []): string
    {
        return $this->response;
    }
}

class ClientTest extends TestCase
{
    /**
     * @throws ApiException
     */
    public function testTimeSeriesIntraday()
    {
        $fakeResponse = json_encode([
            'Meta Data' => ['1. Information' => 'Intraday (1min) open, high, low, close prices and volume'],
            'Time Series (1min)' => []
        ]);
        $mockHttpClient = new MockHttpClient($fakeResponse);

        $client = new Client('demo', $mockHttpClient);
        $result = $client->timeSeries()->intraday('MSFT', '1min');

        $this->assertIsArray($result);
        $this->assertArrayHasKey('Meta Data', $result);
    }

    /**
     * @throws ApiException
     */
    public function testForexExchangeRate()
    {
        $fakeResponse = json_encode([
            'Realtime Currency Exchange Rate' => []
        ]);
        $mockHttpClient = new MockHttpClient($fakeResponse);

        $client = new Client('demo', $mockHttpClient);
        $result = $client->forex()->getExchangeRate('USD', 'EUR');

        $this->assertIsArray($result);
        $this->assertArrayHasKey('Realtime Currency Exchange Rate', $result);
    }
}
