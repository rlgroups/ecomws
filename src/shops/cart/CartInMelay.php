<?php

namespace Ecomws\Cart;

use Ecomws\Cart\Base;

class CartInMelay extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'CartInMelay';

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
            'LoginID' => Self::$loginID,
            'LoginPassword' => Self::$loginPassword,
            'Token' => Self::$token,
            'StoreId' => $this->storeId
        ];
    }

}
