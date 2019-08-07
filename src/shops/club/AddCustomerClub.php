<?php

namespace Ecomws\Club;

use Ecomws\Club\Base;

class AddCustomerClub extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'AddCustomer_Club';

    /**
     * The array of customer.
     *
     * @var array
     */
    /*
    [
    //'C' => 'yehdua',
    'Name' => 'yehdua',
    'LastName' => 'f',
    'UserName' => 'yehduaF',
    'IdentityCard' => '206666663',
    'PhoneCode' => '08',
    'Phone' => '9699696',
    'PelefonCode' => '054',
    'Pelefon' => '8592663',
    'Email' => 'yehdua1a111a23ss345@gmail.com',
    'Password' => 'yehdua123',
    'PasswordRepeat' => 'yehdua123',
    //'DateOpen' => '',
    //'DateClose' => '',
    'Active' => 1,
    'NotSendEmail' => 'true',
    'NotSendSMS' => 'true',
    'IsSelfPickUp' => 'true',
    //'SelfPickUpStoreId' => '1',
    //'StoreKod ' => 1,
    'ShowMessage' => 'true',
    'BirthDate' => '',
    'LogActivity' => 'true',
    'NotPaying' => 'true',
    //'swFirstTimeClub' => '1',
    //'swCustomerClub' => '0',
    'IsBusinessCustomer' => 'false',
    'hasList' => 'false',
    //'shopListId' => '4',
    // 'CustomerAddress'=> [
    //     'CustomerAddress' => [
    //         'Number' => '1'
    //     ]
    // ]
     ]
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
    /*['CustomerAddress' => [
        'Id' => 0,
        'CustomerId' => 0,
        'FirstName' => 'yehdua',
        'LastName' => 'yehdua',
        'Mobile' => '',
        'AddressRemark' => '',
        'CityId' => '2',
        'StreetId' => '3',
        'Number' => '3',
        'Neighborhood' => 'החשמונאים',
        'Flat' => '',
        'Koma' => '2',
        'ZipCode' => '12345',
        'Structure' => '',
        'Floor' => '',
        'Apartment' => '',
        'Entrance' => '',
        'Elevator' => '',
        'Notes' => '',
        'Street' => '',
        'City' => '',
        'OrderNumber' => '',
        'AddressName' => '',
        'StoreAddressId' => '',
        'IsDefault' => '',
        'IsSelfPickUp' => '',
        'StoreName' => '',
        'StoreAddres' => '',
        'SelfPickUpShipmentRemark' => ''
        ]
     ]*/
    protected $address;


    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }


    public function toArray()
    {
        return [
            'LoginID' => Self::$loginID,
            'LoginPassword' => Self::$loginPassword,
            'customer' => $this->customer,
            'address' => $this->address,
            'Token' => Self::$token
        ];
    }

}
