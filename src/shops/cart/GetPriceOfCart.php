<?php

namespace Ecomws\Cart;

use Ecomws\Cart\Base;

class GetPriceOfCart extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'GetPriceOfCart';

    /**
     * The int of storeId.
     *
     * @var int
     */
    protected $storeId;


    public function setStoreId($storeId)
    {
        $this->storeId = $storeId;

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
            'StoreId' => $this->storeId,
            'AddListItems' => $this->items
        ];
    }

    public function mapDataResponse($data)
    {
        if(!empty($data['itemlist']) && !empty($data['itemlist']['CheckoutItem']) && !isset($data['itemlist']['CheckoutItem'][0])){
            $data['itemlist']['CheckoutItem'] = [$data['itemlist']['CheckoutItem']];
        }

        return [
            'item_list' => $data['itemlist'] ?? null,
            'less_items' => $data['lessitems'] ?? null,
            'cart_qty' => $data['CartQty'],
            'cart_price' => $data['CartPrice'] ?? null,
            'Status' => $data['Status']
        ];

    }
}
