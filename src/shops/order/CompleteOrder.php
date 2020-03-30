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

    protected $status = 0;

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
            'Items' => $this->items,
            'Comax616Status' => $this->status,
        ];
    }

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function mapDataResponse($data)
    {
        return [
            'Status' => $data['Status'] ?? '-1',
            'data' => $data
        ];
    }
}
