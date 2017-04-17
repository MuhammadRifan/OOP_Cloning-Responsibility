<?php

class User
{
    private $email;
    private $password;

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
        // code yang ada sebelumnya dihapus dan dipindah ke dalam file Validator

        $this->password = $string;
        // mengapa kita me return $this ? karena ini adalah syarat agar konsep method chaining bekerja
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setEmail($string)
    {
        // code yang ada sebelumnya dihapus dan dipindah ke dalam file Validator

        $this->email = $string;
        // mengapa kita me return $this ? karena ini adalah syarat agar konsep method chaining bekerja
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    // code yang ada sebelumnya dihapus dan dipindah ke dalam file Validator
}
