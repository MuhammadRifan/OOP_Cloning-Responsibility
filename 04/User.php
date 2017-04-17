<?php

class User
{
    private $email;
    private $password;
    const MINCHARS = 8;

    public function login()
    {
        return 'logging in ..';
    }

    public function logout()
    {
        return 'logging out ...';
    }

    public function setPassword($string)
    {
        if ($this->validatePassword($string) == false) {
            throw new Exception('Minimal karakter password adalah '.self::MINCHARS);
        }
        $this->password = hash('sha256', $string);
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setEmail($string)
    {
        if (!filter_var($string, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Gunakan email yang valid');
        }
        $this->email = $string;
    }

    public function getEmail()
    {
        return $this->email;
    }

    private function validatePassword($string)
    {
        return strlen($string) < self::MINCHARS ? false : true;
    }
}
