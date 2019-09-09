<?php

namespace Ecomws\Club;

use Ecomws\Club\Base;

class CustomerCredit extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'CustomerCredit';

    public function toArray()
    {
        return [
            'Token' => Self::$token
        ];
    }

    public function mapDataResponse($data)
    {
        $data['data'] = $data['ListCredits'] && !empty($data['ListCredits']['CustomerCredit'])
            ? (
                isset($data['ListCredits']['CustomerCredit'][0])
                    ? $data['ListCredits']['CustomerCredit']
                    : [$data['ListCredits']['CustomerCredit']]
                )
            : null;


        return [
            'data' => $data['data'] ,
            'Status' => $data['Status']
        ];
    }

}
