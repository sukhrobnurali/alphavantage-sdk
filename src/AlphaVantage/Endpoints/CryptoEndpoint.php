<?php
declare(strict_types=1);

namespace AlphaVantage\Endpoints;

use AlphaVantage\Exception\ApiException;

/**
 * Class CryptoEndpoint
 *
 * Provides methods for cryptocurrency data.
 */
class CryptoEndpoint extends AbstractEndpoint
{
    /**
     * Retrieve daily digital currency data.
     *
     * @param string $symbol Cryptocurrency symbol (e.g., "BTC").
     * @param string $market Market currency (e.g., "USD").
     *
     * @return array
     *
     * @throws ApiException
     */
    public function daily(string $symbol, string $market): array
    {
        $params = [
            'function' => 'DIGITAL_CURRENCY_DAILY',
            'symbol'   => strtoupper($symbol),
            'market'   => strtoupper($market),
        ];

        return $this->request($params);
    }

    /**
     * Retrieve weekly digital currency data.
     *
     * @param string $symbol
     * @param string $market
     *
     * @return array
     *
     * @throws ApiException
     */
    public function weekly(string $symbol, string $market): array
    {
        $params = [
            'function' => 'DIGITAL_CURRENCY_WEEKLY',
            'symbol'   => strtoupper($symbol),
            'market'   => strtoupper($market),
        ];

        return $this->request($params);
    }

    /**
     * Retrieve monthly digital currency data.
     *
     * @param string $symbol
     * @param string $market
     *
     * @return array
     *
     * @throws ApiException
     */
    public function monthly(string $symbol, string $market): array
    {
        $params = [
            'function' => 'DIGITAL_CURRENCY_MONTHLY',
            'symbol'   => strtoupper($symbol),
            'market'   => strtoupper($market),
        ];

        return $this->request($params);
    }
}
