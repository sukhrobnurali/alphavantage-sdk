<?php
declare(strict_types=1);

namespace AlphaVantage\Endpoints;

use AlphaVantage\Exception\ApiException;

/**
 * Class TechnicalIndicatorEndpoint
 *
 * Provides access to various technical indicators.
 */
class TechnicalIndicatorEndpoint extends AbstractEndpoint
{
    /**
     * Retrieve technical indicator data.
     *
     * @param string $indicator The indicator function (e.g., "SMA", "EMA").
     * @param array $params Additional parameters (such as "symbol", "interval", etc.).
     *
     * @return array
     *
     * @throws ApiException
     */
    public function get(string $indicator, array $params): array
    {
        $params['function'] = strtoupper($indicator);
        return $this->request($params);
    }
}
