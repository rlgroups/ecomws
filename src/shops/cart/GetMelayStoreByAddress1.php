<?php

namespace Ecomws\Cart;

use Ecomws\Cart\Base;

class GetMelayStoreByAddress extends Base
{
    /**
     * The int of cityId.
     *
     * @var int
     */
    protected $cityId;


    public function setCityId($cityId)
    {
        $this->cityId = $cityId;

        return $this;
    }

    /**
     * The int of streetId.
     *
     * @var int
     */
    protected $streetId;


    public function setStreetId($streetId)
    {
        $this->streetId = $streetId;

        return $this;
    }

    /**
     * The int of streetNo.
     *
     * @var int
     */
    protected $streetNo;


    public function setStreetNo($streetNo)
    {
        $this->streetNo = $streetNo;

        return $this;
    }

    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'GetMelayStoreByAddress';

    public function toArray()
    {
        return [
            'Token' => Self::$token,
            'CityId' => $this->cityId,
            'StreetId' => $this->streetId,
            'StreetNo' => $this->streetNo,
        ];
    }

}
