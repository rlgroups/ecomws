<?php

namespace Ecomws\Club;

use Ecomws\Club\Base;

class CustomerCredit extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'CustomerCredit';

    public function toArray()
    {
        return [
            'Token' => Self::$token
        ];
    }

}
