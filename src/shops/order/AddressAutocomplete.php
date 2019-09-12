<?php

namespace Ecomws\Order;

use Ecomws\Order\Base;

class AddressAutocomplete extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'AddressAutocomplete';

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
     * The string of number.
     *
     * @var string
     */
    protected $number;


    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * The string of searchterm.
     *
     * @var string
     */
    protected $searchterm;


    public function setSearchterm($searchterm)
    {
        $this->searchterm = $searchterm;

        return $this;
    }


    public function toArray()
    {
        return [
            'Token' => Self::$token,
            'City' => $this->city,
            'Street' => $this->street,
            'Number' => $this->number,
            'searchterm' => $this->searchterm
        ];
    }


    public function mapDataResponse($data)
    {
        if(!empty($data['listCityZip']) && !empty($data['listCityZip']['ListCityZip'])){
            return [
                'data' => isset($data['listCityZip']['ListCityZip'][0]) ? $data['listCityZip']['ListCityZip'] : [$data['listCityZip']['ListCityZip']],
                'Status' => $data['Status']
            ];
        }
        return $data;
    }

}
