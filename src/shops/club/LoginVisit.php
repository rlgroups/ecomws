<?php

namespace Ecomws\Club;

use Ecomws\Club\Base;

class LoginVisit extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'login_Visit';

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

    public function toArray()
    {
        return [
            'LoginID' => Self::$loginID,
            'LoginPassword' => Self::$loginPassword,
            'IP' => $this->ip
        ];
    }

}
