<?php

namespace Ecomws\Club;

use Ecomws\Club\Base;

class GetCustomerProfile extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'GetCustomerProfile';

    public function toArray()
    {
        return [
            //'LoginID' => Self::$loginID,
            //'LoginPassword' => Self::$loginPassword,
            'Token' => Self::$token
        ];
    }

}
