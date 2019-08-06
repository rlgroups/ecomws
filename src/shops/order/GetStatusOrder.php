<?php

namespace Ecomws\Order;

use Ecomws\Order\Base;

class GetStatusOrder extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'GetStatusOrder';

    /**
     * The string of statusCode.
     *
     * @var string
     */
    protected $statusCode;


    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * The string of closeOrder.
     *
     * @var string
     */
    protected $closeOrder;


    public function setCloseOrder($closeOrder)
    {
        $this->closeOrder = $closeOrder;

        return $this;
    }

    /**
     * The string of statusNm.
     *
     * @var string
     */
    protected $statusNm;


    public function setStatusNm($statusNm)
    {
        $this->statusNm = $statusNm;

        return $this;
    }

    /**
     * The string of message.
     *
     * @var string
     */
    protected $message;


    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * The string of status.
     *
     * @var string
     */
    protected $status;


    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }


    public function toArray()
    {
        return [
            'StatusCode' => $this->statusCode,
            'CloseOrder' => $this->closeOrder,
            'StatusNm' => $this->statusNm,
            'Message' => $this->message,
            'Status' => $this->status,
            'Token' => Self::$token
        ];
    }

}
