<?php

namespace Ecomws\Club;

use Ecomws\Club\Base;

class DeleteCustomerAddress extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'DeleteCustomerAddress';

    /**
     * The string of addressId.
     *
     * @var string
     */
    protected $addressId;

    public function setAddressId($addressId)
    {
        $this->addressId = $addressId;

        return $this;
    }

    public function toArray()
    {
        return [
            'Token' => Self::$token,
            'AddressId' => $this->addressId
        ];
    }

    public function mapDataResponse($data)
    {
        return [
            'data' => $data,
            'Status' => $data
        ];
    }

    public function mapDataResponse($data)
    {
        return [
            'data' => $data,
            'Status' => $data
        ];
    }


}
