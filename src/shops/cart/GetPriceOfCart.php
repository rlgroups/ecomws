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


    public function setItems($item)
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

    public function getPriceDelivery(Request $request)
    {
        /*$attr = $this->validate($request, [
            'Token' => 'required',
            'SupplyDayC' => 'required',
            'Cost' => 'required'
            'StoreId' => 'required'
        ]);*/
        return (new GetPriceDelivery())
                    ->setToken($this->token)
                    ->setSupplyDayC(1109)
                    ->setCost(500)
                    ->setStoreId(179)
                    ->request();
    }

    public function getPriceOfCart(Request $request)
    {
        return (new GetPriceOfCart())
                    ->setToken($this->token)
                    ->setStoreId(179)
                    ->setItems([
                        'item' => [

                        ]
                    ])
                    ->request();
    }
}
