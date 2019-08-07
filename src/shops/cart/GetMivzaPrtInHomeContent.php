<?php

namespace Ecomws\Cart;

use Ecomws\Cart\Base;

class GetMivzaPrtInHomeContent extends Base
{
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
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'GetMivzaPrtInHomeContent';

    public function toArray()
    {
        return [
            'LoginID' => Self::$loginID,
            'LoginPassword' => Self::$loginPassword,
            'StoreId' => $this->storeId
        ];
    }

}
