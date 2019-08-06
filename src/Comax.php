<?php

namespace Ecomws;

/**
 * Class Comax
 *
 * @package Comax
 */
class Comax
{
    use ApiRequestor;

    /**
     * The base URL for the Comax API.
     *
     * @var string
     */
    public static $apiHost;

    /**
     * The base URL for the Comax API.
     *
     * @var string
     */
    public static $log = false;

    /**
     * The version of the Comax API to use for requests.
     *
     * @var string
     */
    public static $apiVersion = '0.1';

    function __construct()
    {
        $config = config('services.comaxecomws');

        //$this->apiHost = $config['Host'];
        self::$apiHost = $config['Host'];
        self::$log = $config['log'] ?? false;

    }

}
