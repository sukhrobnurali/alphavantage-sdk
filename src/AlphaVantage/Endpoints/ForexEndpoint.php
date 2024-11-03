<?php
declare(strict_types=1);

namespace AlphaVantage\Endpoints;

use AlphaVantage\Exception\ApiException;

/**
 * Class ForexEndpoint
 *
 * Provides methods for forex data.
 */
class ForexEndpoint extends AbstractEndpoint
{
    /**
     * Retrieve the real-time currency exchange rate.
     *
     * @param string $fromCurrency Base currency (e.g., "USD").
     * @param string $toCurrency Target currency (e.g., "EUR").
     *
     * @return array
     *
     * @throws ApiException
     */
    public function getExchangeRate(string $fromCurrency, string $toCurrency): array
    {
        $params = [
            'function'      => 'CURRENCY_EXCHANGE_RATE',
            'from_currency' => strtoupper($fromCurrency),
            'to_currency'   => strtoupper($toCurrency),
        ];

        return $this->request($params);
    }

    /**
     * Retrieve forex intraday data.
     *
     * @param string $fromCurrency Base currency.
     * @param string $toCurrency Target currency.
     * @param string $interval Time interval (e.g., "1min", "5min").
     *
     * @return array
     *
     * @throws ApiException
     */
    public function intraday(string $fromCurrency, string $toCurrency, string $interval): array
    {
        $params = [
            'function'    => 'FX_INTRADAY',
            'from_symbol' => strtoupper($fromCurrency),
            'to_symbol'   => strtoupper($toCurrency),
            'interval'    => $interval,
        ];

        return $this->request($params);
    }
}
