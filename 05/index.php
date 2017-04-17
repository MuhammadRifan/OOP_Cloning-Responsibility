<?php

require 'app/User.php'; // file yang digunakan untuk meng hash password
require 'app/Validator.php'; // file yang digunakan untuk menfilter data yang dimasukkan
require 'app/Helper.php'; // file yang digunakan untuk meng hash password

// menentukan syarat yang diperlukan
$rules = array('email' => 'required|email', 'password' => 'required|min:8');

// menentukan data yang akan digunakan
$data = array('email' => 'budi@email.com', 'password' => '12345678');

$validator = new Validator();

// untuk mengetes apakah data mencukupi syarat yang diperlukan
if ($validator->validate($data, $rules) === true) {
    // menggunakan === ( identical ) agar data yang diproses benar - benar mirip / sama
    // jika berhasil, mendeklarasikan object baru untuk class user
    $budi = new User();

    // menset email dan password menggunakan konsep method chaining,
    // ini lebih mudah dilakukan jika kita menset private property menggunakan method
    // tapi kita membutuhkan satu syarat ( cek Validator.php )
    $budi->setEmail($data['email'])
        ->setPassword(getHash($data['password']));

    var_dump($budi);
} else {
    // jika salah, akan menampilkan method getErrors
    var_dump($validator->getErrors());
}
