<?php

namespace Ecomws\Cart;

use Ecomws\Cart\Base;

class ConsolidationBaskets extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'Consolidation_baskets';

    /**
     * The string of oldToken.
     *
     * @var string
     */
    protected $oldToken;


    public function setOldToken($oldToken)
    {
        $this->oldToken = $oldToken;

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
            'OldToken' => $this->oldToken,
            'StoreId' => $this->storeId
        ];
    }

}
