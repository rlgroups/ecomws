<?php

namespace Ecomws\Order;

use Ecomws\Order\Base;

class GetSupplyDate extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'GetSupplyDate';

    /**
     * The string of city.
     *
     * @var string
     */
    protected $city;


    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * The string of street.
     *
     * @var string
     */
    protected $street;


    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * The string of streetNo.
     *
     * @var string
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
            'Token' => Self::$token,
            'LoginID' => Self::$loginID,
            'LoginPassword' => Self::$loginPassword,
            'City' => $this->city,
            'Street' => $this->street,
            'StreetNo' => $this->streetNo
        ];
    }

    public function mapDataResponse($data)
    {
        $data['data'] = !empty($data['ListTime']) && !empty($data['ListTime']['DaysTime'])
            ? (
                isset($data['ListTime']['DaysTime'][0])
                    ? $data['ListTime']['DaysTime']
                    : [$data['ListTime']['DaysTime']]
                )
            : -1;
        return [
            'Status' => $data['Status'],
            'data' => $data['data']
        ];
    }
}
