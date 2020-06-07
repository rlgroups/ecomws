<?php

namespace Ecomws\Credit;

use Ecomws\Comax;

class Base extends Comax
{
    public static $apiBase = 'Credit_GetTokenLogin.asmx';

    /**
     * The Comax authentication username.
     *
     * @var string
     */
    public static $username;

    /**
     * The Comax authentication loginID.
     *
     * @var string
     */
    public static $loginID;

    /**
     * The Comax authentication password.
     *
     * @var string
     */
    public static $password;

    /**
     * The Comax authentication loginPassword.
     *
     * @var string
     */
    public static $loginPassword;


    /**
     * The client ip.
     *
     * @var string|null
     */
    public static $token = null;


    /**
     * Sets the username to be used for requests.
     *
     * @param string $username
     */
    public function setUserName($username)
    {
        self::$username = $username;

        return $this;
    }

    public function setLoginId($loginId)
    {
        self::$loginID = $loginId;

        return $this;
    }
    /**
     * Sets the API password to be used for requests.
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        self::$password = $password;

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
