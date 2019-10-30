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
     * The reLogin function.
     *
     * @var string
     */
    public $reLogin = false;

    /**
     * The userId send log.
     *
     * @var string
     */
    public $userId = null;

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

    public function setReLogin($function) {
        $this->reLogin = $function();
    }

    /*public function getUserId() {
        return $this->userId;
    }*/

    public function setUserId($userId) {
        $this->userId = $userId;

        return $this;
    }

}
