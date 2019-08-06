<?php

namespace Ecomws\Order;

use Ecomws\Order\Base;

class GetSnifPlace extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'GetSnifPlace';

    public function toArray()
    {
        return [
            'LoginID' => Self::$loginID,
            'LoginPassword' => Self::$loginPassword
        ];
    }

}
