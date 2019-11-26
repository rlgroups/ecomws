<?php

namespace Ecomws\Order;

use Ecomws\Order\Base;

class GetMelayStoreByAddress extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'GetMelayStoreByAddress';

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

    public function toArray()
    {
        return [
            'LoginID' => Self::$loginID,
            'LoginPassword' => Self::$loginPassword,
            //'Token' => Self::$token,
            'CityId' => $this->cityId,//245
            'StreetId' => $this->streetId,
            'StreetNo' => $this->streetNo
        ];
    }
     public function mapDataResponse($data)
    {
        return [
            'Status' => '200',
            'data' => [
                'area_id' => $data['AreaId'],
                'store_id' => $data['StoreId'],
            ]
        ];
    }
}
