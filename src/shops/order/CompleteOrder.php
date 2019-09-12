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
            'Token' => Self::$token,
            'order' => $this->order,
            'Items' => $this->items
        ];
    }

    public function mapDataResponse($data)
    {
        return [
            'Status' => '200',
            'data' => $data
        ];
    }
}
