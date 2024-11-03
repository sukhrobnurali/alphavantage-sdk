<?php
declare(strict_types=1);

namespace AlphaVantage\Endpoints;

use AlphaVantage\Exception\ApiException;

/**
 * Class TimeSeriesEndpoint
 *
 * Provides methods for stock time series data.
 */
class TimeSeriesEndpoint extends AbstractEndpoint
{
    /**
     * Retrieve intraday time series data.
     *
     * @param string $symbol Stock symbol (e.g., "MSFT").
     * @param string $interval Time interval (e.g., "1min", "5min").
     * @param string $outputSize "compact" or "full".
     *
     * @return array
     *
     * @throws ApiException
     */
    public function intraday(string $symbol, string $interval, string $outputSize = 'compact'): array
    {
        $params = [
            'function'   => 'TIME_SERIES_INTRADAY',
            'symbol'     => $symbol,
            'interval'   => $interval,
            'outputsize' => $outputSize,
        ];

        return $this->request($params);
    }

    /**
     * Retrieve daily time series data.
     *
     * @param string $symbol Stock symbol.
     * @param string $outputSize "compact" or "full".
     *
     * @return array
     *
     * @throws ApiException
     */
    public function daily(string $symbol, string $outputSize = 'compact'): array
    {
        $params = [
            'function'   => 'TIME_SERIES_DAILY',
            'symbol'     => $symbol,
            'outputsize' => $outputSize,
        ];

        return $this->request($params);
    }

    /**
     * Retrieve weekly time series data.
     *
     * @param string $symbol Stock symbol.
     *
     * @return array
     *
     * @throws ApiException
     */
    public function weekly(string $symbol): array
    {
        $params = [
            'function' => 'TIME_SERIES_WEEKLY',
            'symbol'   => $symbol,
        ];

        return $this->request($params);
    }

    /**
     * Retrieve monthly time series data.
     *
     * @param string $symbol Stock symbol.
     *
     * @return array
     *
     * @throws ApiException
     */
    public function monthly(string $symbol): array
    {
        $params = [
            'function' => 'TIME_SERIES_MONTHLY',
            'symbol'   => $symbol,
        ];

        return $this->request($params);
    }
}
