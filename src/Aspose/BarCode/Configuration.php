<?php

declare(strict_types=1);

namespace Aspose\BarCode;

use InvalidArgumentException;
use JsonSerializable;

/**
 * Represents a set of configuration settings
 */

class Configuration implements JsonSerializable
{
    private static $_defaultConfiguration;

    /**
     * Version of Aspose.BarCode Cloud API
     *
     * @var string
     */
    protected $clientVersion = '26.3.1';

    /**
     * ClientId for API
     *
     * @var string
     */
    protected $clientId = null;

    /**
     * ClientSecret for API
     *
     * @var string
     */
    protected $clientSecret = null;

    /**
     * Access token for OAuth
     *
     * @var string
     */
    protected $accessToken = null;

    /**
     * The host
     *
     * @var string
     */
    protected $host = 'https://api.aspose.cloud';

    protected $authUrl = 'https://id.aspose.cloud/connect/token';

    /**
     * Version of API to use, possible values are v1, v1.1, v2, v3
     * default value is v1
     * @var string
     */
    protected $base_path = '/v4.0';

    /**
     * User agent of the HTTP request, set to 'php sdk' by default
     *
     * @var string
     */
    protected $userAgent = 'php sdk';

    /**
     * Debug switch (default set to false)
     *
     * @var bool
     */
    protected $debug = false;

    /**
     * Debug file location (log to STDOUT by default)
     *
     * @var string
     */
    protected $debugFile = 'php://output';

    /**
     * Debug file location (log to STDOUT by default)
     *
     * @var string
     */
    protected $tempFolderPath;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tempFolderPath = sys_get_temp_dir();
    }

    /**
     * Gets client version
     * @return string
     */
    public function getClientVersion()
    {
        return $this->clientVersion;
    }

    /**
     * Sets ClientId
     *
     * @param string $clientId
     *
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * Gets ClientId
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Sets ClientSecret
     *
     * @param string $clientSecret
     */
    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;
    }

    /**
     * Gets ClientSecret
     * @return string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * Sets the access token for OAuth
     *
     * @param string $accessToken Token for OAuth
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * Gets the access token for OAuth
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * Sets the host
     *
     * @param string $host Host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * Gets the host
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    public function setAuthUrl($authUrl)
    {
        $this->authUrl = $authUrl;
    }

    /**
     * Gets Auth URL for token
     * @return string
     */
    public function getAuthUrl()
    {
        return $this->authUrl;
    }

    /**
     * Gets the base_path
     * @return string
     */
    public function getBasePath()
    {
        return $this->base_path;
    }

    /**
     * Sets the user agent of the api client
     *
     * @param string $userAgent the user agent of the api client
     *
     * @throws InvalidArgumentException
     */
    public function setUserAgent($userAgent)
    {
        if (!is_string($userAgent)) {
            throw new InvalidArgumentException('User-agent must be a string.');
        }

        $this->userAgent = $userAgent;
    }

    /**
     * Gets the user agent of the api client
     * @return string
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * Sets debug flag
     *
     * @param bool $debug Debug flag
     */
    public function setDebug($debug)
    {
        $this->debug = $debug;
    }

    /**
     * Gets the debug flag
     * @return bool
     */
    public function getDebug()
    {
        return $this->debug;
    }

    /**
     * Gets the debug file
     * @return string
     */
    public function getDebugFile()
    {
        return $this->debugFile;
    }

    /**
     * Gets the temp folder path
     * @return string
     */
    public function getTempFolderPath()
    {
        return $this->tempFolderPath;
    }

    /**
     * Gets the default configuration instance
     * @return Configuration
     */
    public static function getDefaultConfiguration()
    {
        if (self::$_defaultConfiguration === null) {
            self::$_defaultConfiguration = new Configuration();
        }

        return self::$_defaultConfiguration;
    }

    /**
     * implements JsonSerializable
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'ClientId' => $this->clientId,
            'ClientSecret' => $this->clientSecret,
            'Host' => $this->host,
            'AuthUrl' => $this->authUrl,
            'AccessToken' => $this->accessToken,
            'Debug' => $this->debug,
        ];
    }
}
