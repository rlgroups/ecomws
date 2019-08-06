<?php

namespace Ecomws\Club;

use Ecomws\Club\Base;

class Login extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'Login';

    /**
     * The string of email.
     *
     * @var string
     */
    protected $email;
    

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
    
    /**
     * The string of ip.
     *
     * @var string
     */
    protected $ip;
    

    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * The int of swIpus.
     *
     * @var int
     */
    protected $swIpus;
    

    public function setSwIpus($swIpus)
    {
        $this->swIpus = $swIpus;

        return $this;
    }

    public function toArray()
    {
        return [
            'LoginID' => Self::$loginID,
            'LoginPassword' => Self::$loginPassword,
            'Email' => $this->email,
            'Password' => Self::$password,
            'IP' => $this->ip,
            'SwIpus' => $this->swIpus
        ];
    }

}
