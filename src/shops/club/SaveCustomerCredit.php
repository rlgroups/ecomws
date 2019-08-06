<?php

namespace Ecomws\Club;

use Ecomws\Club\Base;

class SaveCustomerCredit extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'SaveCustomerCredit';

    /**
     * The string of lastDigits.
     *
     * @var string
     */
    protected $lastDigits;
    
    public function setLastDigits($lastDigits)
    {
        $this->lastDigits = $lastDigits;

        return $this;
    }

    /**
     * The string of cardToken.
     *
     * @var string
     */
    protected $cardToken;
    
    public function setCardToken($cardToken)
    {
        $this->cardToken = $cardToken;

        return $this;
    }
    
    /**
     * The string of expirationMonth.
     *
     * @var string
     */
    protected $expirationMonth;
    
    public function setExpirationMonth($expirationMonth)
    {
        $this->expirationMonth = $expirationMonth;

        return $this;
    }

    /**
     * The string of expirationYear.
     *
     * @var string
     */
    protected $expirationYear;
    
    public function setExpirationYear($expirationYear)
    {
        $this->expirationYear = $expirationYear;

        return $this;
    }

    /**
     * The string of creditCardNm.
     *
     * @var string
     */
    protected $creditCardNm;
    
    public function setCreditCardNm($creditCardNm)
    {
        $this->creditCardNm = $creditCardNm;

        return $this;
    }

    /**
     * The string of cardType.
     *
     * @var string
     */
    protected $cardType;
    
    public function setCardType($cardType)
    {
        $this->cardType = $cardType;

        return $this;
    }

    public function toArray()
    {
        return [
            'Token' => Self::$token,
            'LastDigits' => $this->lastDigits,
            'CardToken' => $this->cardToken,
            'ExpirationMonth' => $this->expirationMonth,
            'ExpirationYear' => $this->expirationYear,
            'CreditCardNm' => $this->creditCardNm,
            'CardType' => $this->cardType
        ];
    }

}
