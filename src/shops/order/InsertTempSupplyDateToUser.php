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
            'LoginID' => Self::$loginID,
            'LoginPassword' => Self::$loginPassword,
            'Token' => Self::$token,
            'SupplyDay' => $this->supplyDay,
            'SupplyDate' => $this->supplyDate,
        ];
    }

}
