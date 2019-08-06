<?php

namespace Ecomws\Club;

use Ecomws\Club\Base;

class GetCreditDetails extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'GetCreditDetails';

    /**
     * The string of cardNumber.
     *
     * @var string
     */
    protected $cardNumber;


    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    public function toArray()
    {
        return [
            'Token' => Self::$token,
            'CardNumber' => $this->cardNumber
        ];
    }

}
