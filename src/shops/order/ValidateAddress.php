<?php

namespace Ecomws\Order;

use Ecomws\Order\Base;

class ValidateAddress extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'ValidateAddress';

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
    public function toArray()
    {
        return [
            'LoginID' => Self::$loginID,
            'LoginPassword' => Self::$loginPassword,
            'City' => $this->city,
            'Street' => $this->street,
            'Number' => $this->number
        ];
    }

}
