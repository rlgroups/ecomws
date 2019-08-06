<?php

namespace Ecomws\Club;

use Ecomws\Club\Base;

class UpdateCustomerClub extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'UpdateCustomer_Club';


    /**
     * The array of customer.
     *
     * @var array
     */
    protected $customer;


    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * The array of address.
     *
     * @var array
     */
    protected $address;


    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }


    public function toArray()
    {
        return [
            'Token' => Self::$token,
            'customer' => $this->customer,
            'address' => $this->address
        ];
    }

}
