<?php

namespace Ecomws\Cart;

use Ecomws\Cart\Base;

class DeleteCart extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'DeleteCart';

    public function toArray()
    {
        return [
            'Token' => Self::$token
        ];
    }

    public function mapDataResponse($data)
    {
        return [
            'Status' => $data
        ];
    }

}
