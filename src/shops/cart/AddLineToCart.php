<?php

namespace Ecomws\Cart;

use Ecomws\Cart\Base;

class AddLineToCart extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'Add_Line_ToCart';

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
     * The array of addItem.
     *
     * @var array
     */
    protected $addItem;


    public function setAddItem($addItem)
    {
        $this->addItem = $addItem;

        return $this;
    }


    public function toArray()
    {
        return [
            /*'LoginID' => Self::$loginID,
            'LoginPassword' => Self::$loginPassword,*/
            'Token' => Self::$token,
            'StoreId' => $this->storeId,
            'addItem' => $this->addItem
        ];
    }

}
