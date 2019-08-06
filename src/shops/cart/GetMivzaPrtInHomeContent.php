<?php

namespace Ecomws\Cart;

use Ecomws\Cart\Base;

class GetMivzaPrtInHomeContent extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'GetMivzaPrtInHomeContent';

    public function toArray()
    {
        return [
            'LoginID' => Self::$loginID,
            'LoginPassword' => Self::$loginPassword
        ];
    }

}
