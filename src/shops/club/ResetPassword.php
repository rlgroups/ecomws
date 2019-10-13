<?php

namespace Ecomws\Club;

use Ecomws\Club\Base;

class ResetPassword extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'ResetPassword';


    /**
     * The string of email.
     *
     * @var string
     */
    protected $email;


    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function toArray()
    {
        return [
            'LoginID' => Self::$loginID,
            'LoginPassword' => Self::$loginPassword,
            'Email' => $this->email
        ];
    }

    public function mapDataResponse($data)
    {
        return [
            'Status' => $data['Status'],
            'data' => [
                'customer_c' => $data['CustomerC'] ?? null,
                'group' => $data['Group'] ?? null,
                'message' => $data['Message'] ?? null,
                'user_ID' => $data['user_ID'] ?? null,
            ]
        ];
    }
}
