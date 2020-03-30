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

    protected $ignoreErr = '';


    public function toArray()
    {
        return [
            'Token' => Self::$token,
            'Loginid' => Self::$loginID,
            'Password' => Self::$password,
            'ProceedOnShvaErr' => $this->ignoreErr
        ];
    }

    public function setIgnoreErr($ignoreErr)
    {
        $this->ignoreErr = $ignoreErr;

        return $this;
    }

    public function mapDataResponse($data)
    {
        return [
            'data' => $data,
            'Status' => in_array($data, ['403', 'error 403']) ? "403" : '200'
        ];
    }
}
