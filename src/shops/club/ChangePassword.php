<?php

namespace Ecomws\Club;

use Ecomws\Club\Base;

class ChangePassword extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'ChangePassword';


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
    /**
     * The string of password.
     *
     * @var string
     */
    protected $password;


    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function toArray()
    {
        return [
            'LoginID' => Self::$loginID,
            'LoginPassword' => Self::$loginPassword,
            'Email' => $this->email,
            'Password' => $this->password,
        ];
    }

}
