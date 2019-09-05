<?php

namespace Ecomws\Club;

use Ecomws\Club\Base;

class LoginWithFacebook extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'LoginWithFacebook';

    /**
     * The string of tokenFacebook.
     *
     * @var string
     */
    protected $tokenFacebook;


    public function setTokenFacebook($tokenFacebook)
    {
        $this->tokenFacebook = $tokenFacebook;

        return $this;
    }

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
     * The string of firstName.
     *
     * @var string
     */
    protected $firstName;


    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * The string of lastName.
     *
     * @var string
     */
    protected $lastName;


    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function toArray()
    {
        return [
            'LoginID' => Self::$loginID,
            'LoginPassword' => Self::$loginPassword,
            'Token' => 'EAAhBoECWZAW0BADDJQXMesczs9m00gnzNvsxZBGg6V9Rv5ZBZADEseh1DX6XR1VZCAXeryXGtqyH6kVrwxAW4oWNTCpJpuJMu1wvBF0ztEPoUkCboMyaNZBKMUNW58JeDxeZByM0JfQkJDIlaUMZBX8UZBmwZBiNrOBkbIiCI4hjxi0cVc1qOwVqd03bSQyZBmKD8RbFiVF4EJ0QKtvcLP9NBeH',//$this->tokenFacebook,
            'Email' => $this->email,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName
        ];
    }

}
