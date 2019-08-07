<?php

namespace Ecomws\Cart;

use Ecomws\Cart\Base;

class GetPriceDelivery extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'GetPriceDelivery';

    /**
     * The int of supplyDayC.
     *
     * @var int
     */
    protected $supplyDayC;


    public function setSupplyDayC($supplyDayC)
    {
        $this->supplyDayC = $supplyDayC;

        return $this;
    }

    /**
     * The int of cost.
     *
     * @var int
     */
    protected $cost;


    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

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

    public function toArray()
    {
        return [
            'Token' => Self::$token,
            'SupplyDayC' => $this->supplyDayC,
            'cost' => $this->cost,
            'StoreId' => $this->storeId
        ];
    }

}
