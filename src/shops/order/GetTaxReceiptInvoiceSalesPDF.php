<?php

namespace Ecomws\Order;

use Ecomws\Order\Base;

class GetTaxReceiptInvoiceSalesPDF extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'Get_TaxReceiptInvoiceSalesPDF';



    /**
     * The int of orderC.
     *
     * @var int
     */
    protected $orderC;


    public function setOrderC($orderC)
    {
        $this->orderC = $orderC;

        return $this;
    }

    public function toArray()
    {
        return [
            'Token' => Self::$token,
            'OrderC' => $this->orderC
        ];
    }

    public function mapDataResponse($data)
    {
        if($data == 'Order not found' || is_array($data)){
            return [
                'Status' => '-1',
                'data' => 'Order not found'
            ];
        }
        return [
            'Status' => '200',
            'data' => $data
        ];
    }
}
