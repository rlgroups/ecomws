<?php

namespace Ecomws\Order;

use Ecomws\Order\Base;

class CompleteOrder extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'CompleteOrder';

    /**
     * The array of order.
     *
     * @var array
     */
    protected $order;


    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * The array of items.
     *
     * @var array
     */
    protected $items;


    public function setItems($items)
    {
        $this->items = $items;

        return $this;
    }


    public function toArray()
    {
        return [
            'Token' => 'd653e036-6817-437b-aff9-1f9ac270f97f',//Self::$token,
            'order' => $this->order,
            'Items' => $this->items
        ];
    }

}
