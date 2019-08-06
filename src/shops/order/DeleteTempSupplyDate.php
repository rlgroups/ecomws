<?php

namespace Ecomws\Order;

use Ecomws\Order\Base;

class DeleteTempSupplyDate extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'DeleteTempSupplyDate';

    public function toArray()
    {
        return [
            'Token' => Self::$token,
        ];
    }

}
