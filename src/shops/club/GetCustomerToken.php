<?php

namespace Ecomws\Club;

use Ecomws\Club\Base;

class GetCustomerToken extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'GetCustomerToken';

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

    public function toArray()
    {
        return [
            'LoginID' => Self::$loginID,
            'LoginPassword' => Self::$loginPassword,
            'Email' => $this->email
        ];
    }

}
