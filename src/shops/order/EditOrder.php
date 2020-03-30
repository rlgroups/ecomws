<?php

namespace Ecomws\Order;

use Ecomws\Order\Base;

class EditOrder extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'EditOrder';


    protected $status = 0;

    /**
     * The string of orderId.
     *
     * @var string
     */
    protected $orderId;


    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

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

    public function setStatus($status)
    {
        $this->status = $status;

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
            'Token' => Self::$token,
            'OrderId' => $this->orderId,
            'order' => $this->order,
            'Items' => $this->items,
            'Comax616Status' => $this->status,
        ];
    }

}
