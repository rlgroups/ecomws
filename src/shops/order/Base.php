<?php

namespace Ecomws\Order;

use Ecomws\Comax;

class Base extends Comax
{
    public static $apiBase = 'CustomersOrders.asmx';

    /**
     * The Comax authentication loginID.
     *
     * @var string
     */
    public static $loginID;

    /**
     * The Comax authentication loginPassword.
     *
     * @var string
     */
    public static $loginPassword;


    /**
     * The token
     *
     * @var string|null
     */
    public static $token = null;

	/**
     * Sets the API password to be used for requests.
     *
     * @param string $password
     */
    public function setLoginId($loginId)
    {
        self::$loginID = $loginId;

        return $this;
    }

    /**
     * Sets the API loginPassword to be used for requests.
     *
     * @param string $loginPassword
     */
    public function setLoginPassword($loginPassword)
    {
        self::$loginPassword = $loginPassword;

        return $this;
    }

    /**
     * Sets the API token to be used for requests.
     *
     * @param string $token
     */
    public function setToken($token)
    {
        self::$token = $token;

        return $this;
    }
}
