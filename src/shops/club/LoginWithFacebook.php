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
            'Token' => $this->tokenFacebook,
            'Email' => $this->email,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName
        ];
    }

    public function mapDataResponse($data)
    {
        return [
            'customer_c' => $data['CustomerC'] ?? null,
            'token' => $data['Token'] ?? null,
            'group' => $data['Group'] ?? null,
            'user_ID' => $data['user_ID'] ?? null,
            'Status' => $data['Status'] ?? null,
        ];
    }
}
