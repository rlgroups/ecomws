<?php

namespace Ecomws\Order;

use Ecomws\Order\Base;

class GetCustomersOrders extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'GetCustomersOrders';


    /**
     * The string of fromOrder.
     *
     * @var string
     */
    protected $fromOrder;


    public function setFromOrder($fromOrder)
    {
        $this->fromOrder = $fromOrder;

        return $this;
    }

    /**
     * The string of toOrder.
     *
     * @var string
     */
    protected $toOrder;


    public function setToOrder($toOrder)
    {
        $this->toOrder = $toOrder;

        return $this;
    }


    public function toArray()
    {
        return [
            'Token' => Self::$token,
            'FromOrder' => $this->fromOrder,
            'ToOrder' => $this->toOrder,
        ];
    }

}
