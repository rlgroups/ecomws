<?php

namespace Ecomws\Order;

use Ecomws\Order\Base;

class GetCustomersOrdersDetails extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'GetCustomersOrdersDetails';


    /**
     * The string of numOrder.
     *
     * @var string
     */
    protected $numOrder;


    public function setNumOrder($numOrder)
    {
        $this->numOrder = $numOrder;

        return $this;
    }

    public function toArray()
    {
        return [
            'Token' => Self::$token,
            'NumOrder' => $this->numOrder
        ];
    }

}
