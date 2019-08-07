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
    /*[
        //'C' => 'yehdua',
        'Name' => 'yehdua2',
        'ComaxC' => '98999982443',
        'Email' => 'yehdua11114@gmail.com',
        'Password' => 'yehdua123',
        'IdNumber' => '4'
     ]*/

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
    /*  [
    'CustomerAddress' =>
        'Id' => 'yehdua',//C or 0
        'CustomerId' => 'yehdua',
        'FirstName' => 'yehdua',
        'LastName' => 'yehdua',
        'Mobile' => 'yehdua',
        'AddressRemark' => 'yehdua',
        'City' => 'yehdua',
        'Street' => 'yehdua',
        'Number' => '3',
        'Neighborhood' => 'yehdua',
        'Flat' => 'yehdua',
        'Koma' => 'yehdua',
        'ZipCode' => 'yehdua',
        'Structure' => 'yehdua',
        'Floor' => 'yehdua',
        'Apartment' => 'yehdua',
        'Entrance' => 'yehdua',
        'Elevator' => 'yehdua',
        'Notes' => 'yehdua',
        'Street' => 'yehdua',
        'City' => 'yehdua',
        'OrderNumber' => 'yehdua',
        'AddressName' => 'yehdua',
        'StoreAddressId' => 'yehdua',
        'IsDefault' => 'yehdua',
        'IsSelfPickUp' => 'yehdua',
        'StoreName' => 'yehdua',
        'StoreAddres' => 'yehdua',
        'SelfPickUpShipmentRemark' => 'yehdua'
    ]*/

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
