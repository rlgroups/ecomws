<?php

namespace Ecomws\Order;

use Ecomws\Order\Base;

class InsertTempSupplyDateToUser extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'InsertTempSupplyDateToUser';

    /**
     * The int of supplyDay.
     *
     * @var int
     */
    protected $supplyDay;


    public function setSupplyDay($supplyDay)
    {
        $this->supplyDay = $supplyDay;

        return $this;
    }

    /**
     * The dateTime of supplyDate.
     *
     * @var dateTime
     */
    protected $supplyDate;


    public function setSupplyDate($supplyDate)
    {
        $this->supplyDate = $supplyDate;

        return $this;
    }


    public function toArray()
    {
        return [
            'Token' => Self::$token,
            'LoginID' => Self::$loginID,
            'LoginPassword' => Self::$loginPassword,
            'SupplyDay' => $this->supplyDay,
            'SupplyDate' => $this->supplyDate,
        ];
    }

    public function mapDataResponse($data)
    {
        if($data == 'true' || $data == 'false'){
            $data = [
                'data' => $data,
                'Status' => '200'
            ];
        }
        return $data;
    }
}
