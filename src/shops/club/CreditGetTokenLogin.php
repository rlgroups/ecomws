<?php

namespace Ecomws\Club;

use Ecomws\Club\Base;

class CreditGetTokenLogin extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'Credit_GetTokenLogin';


    public function toArray()
    {
        return [
            'Token' => Self::$token,
            'Loginid' => Self::$loginID,
            'Password' => Self::$password
        ];
    }

    public function mapDataResponse($data)
    {
        return [
            'data' => $data,
            'Status' => '200'
        ];
    }
}
