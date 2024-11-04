# AlphaVantage SDK

AlphaVantage SDK is a lightweight PHP wrapper for the Alpha Vantage Stock Market API. It allows you to quickly integrate real-time stock prices, trends, and historical data into your applications with minimal setup. Whether you're building a financial dashboard, tracking market trends, or simply exploring stock data, this SDK makes it easy to access all the Alpha Vantage endpoints in a clean, modern, and dependency-free way.

## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [API Documentation](#api-documentation)
  - [Time Series Endpoints](#time-series-endpoints)
  - [Technical Indicator Endpoints](#technical-indicator-endpoints)
  - [Forex Endpoints](#forex-endpoints)
  - [Cryptocurrency Endpoints](#cryptocurrency-endpoints)
- [Testing](#testing)
- [Contributing](#contributing)
- [License](#license)

## Features

- **Full Range Endpoints:** Access Time Series, Technical Indicators, Forex, and Cryptocurrency data.
- **JSON Responses:** Designed to work with JSON only.
- **Dependency-Free HTTP Client:** Uses an inbuilt cURL-based HTTP client.
- **Modern PHP Practices:** Built for PHP 8.1+ with strict typing, PSR-4 autoloading, and PSR-12 coding standards.
- **Robust Error Handling:** Custom exceptions for handling API errors and invalid responses.
- **Comprehensive Testing:** Includes PHPUnit tests to ensure core functionalities remain stable.

## Requirements

- **PHP:** Version 8.1 or later.
- **cURL:** Enabled in PHP for HTTP requests.

## Installation

Install the package via Composer:

```bash
composer require sukhrobnurali/alphavantage-sdk
```


## Usage

The following examples show how to use the different endpoints provided by the SDK.

### 1. Initialization

Begin by including Composer’s autoloader and initializing the client with your API key:

```php
<?php
require 'vendor/autoload.php';

use AlphaVantage\Client;

$apiKey = 'YOUR_ALPHA_VANTAGE_API_KEY';
$client = new Client($apiKey);
```

### 2. Time Series Data

**Retrieve intraday stock data for Microsoft (MSFT) at a 5-minute interval:**

```php
<?php
$intradayData = $client->timeSeries()->intraday('MSFT', '5min');
print_r($intradayData);
```

### 3. Technical Indicators

**Fetch Simple Moving Average (SMA) data for Microsoft (MSFT):**

```php
<?php
$smaData = $client->technicalIndicator()->get('SMA', [
    'symbol'      => 'MSFT',
    'interval'    => 'daily',
    'time_period' => 10,
    'series_type' => 'close'
]);
print_r($smaData);
```

### 4. Forex Data

**Get the real-time exchange rate from USD to EUR:**

```php
<?php
$exchangeRate = $client->forex()->getExchangeRate('USD', 'EUR');
print_r($exchangeRate);
```

### 5. Cryptocurrency Data

**Retrieve daily cryptocurrency data for Bitcoin (BTC) in USD:**

```php
<?php
$cryptoData = $client->crypto()->daily('BTC', 'USD');
print_r($cryptoData);
```



## API Documentation

### Time Series Endpoints

- **Intraday Data**
  - **Method:** `TimeSeriesEndpoint::intraday(string $symbol, string $interval, string $outputSize = 'compact')`
  - **Description:** Retrieves intraday time series data for a specified stock symbol.

- **Daily Data**
  - **Method:** `TimeSeriesEndpoint::daily(string $symbol, string $outputSize = 'compact')`
  - **Description:** Retrieves daily time series data for a specified stock symbol.

- **Weekly Data**
  - **Method:** `TimeSeriesEndpoint::weekly(string $symbol)`
  - **Description:** Retrieves weekly time series data for a specified stock symbol.

- **Monthly Data**
  - **Method:** `TimeSeriesEndpoint::monthly(string $symbol)`
  - **Description:** Retrieves monthly time series data for a specified stock symbol.

### Technical Indicator Endpoints

- **Technical Indicator Data**
  - **Method:** `TechnicalIndicatorEndpoint::get(string $indicator, array $params)`
  - **Description:** Retrieves technical indicator data based on the specified indicator (e.g., SMA, EMA) and parameters.

### Forex Endpoints

- **Exchange Rate**
  - **Method:** `ForexEndpoint::getExchangeRate(string $fromCurrency, string $toCurrency)`
  - **Description:** Retrieves the real-time exchange rate between two currencies.

- **Intraday Forex Data**
  - **Method:** `ForexEndpoint::intraday(string $fromCurrency, string $toCurrency, string $interval)`
  - **Description:** Retrieves intraday forex data for a given currency pair.

### Cryptocurrency Endpoints

- **Daily Data**
  - **Method:** `CryptoEndpoint::daily(string $symbol, string $market)`
  - **Description:** Retrieves daily digital currency data for the specified cryptocurrency and market.

- **Weekly Data**
  - **Method:** `CryptoEndpoint::weekly(string $symbol, string $market)`
  - **Description:** Retrieves weekly digital currency data for the specified cryptocurrency and market.

- **Monthly Data**
  - **Method:** `CryptoEndpoint::monthly(string $symbol, string $market)`
  - **Description:** Retrieves monthly digital currency data for the specified cryptocurrency and market.

## Testing

Run the test suite using Composer:

```bash
composer test
```

The package includes PHPUnit tests that ensure all core functionalities and error handling mechanisms work as expected.

## Contributing

Contributions are welcome! To contribute:

1. **Fork** the repository.
2. **Create a branch** for your feature or bug fix.
3. **Commit** your changes with clear, descriptive messages.
4. **Submit a Pull Request** detailing your changes.

Please adhere to the coding standards (PSR-12) and include tests for new features or bug fixes.

## License

This project is licensed under the MIT License.

---

For any questions or further assistance, please open an issue in the repository.

