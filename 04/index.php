<?php

// clone dan copy, apa perbedaan nya ?
// contoh ada object A dan object B

// jika kita menggunakan copy, maka ketika kita mengganti isi property object yang mencopy ( object B ),
// isi dari property object yang dicopy ( object A ) juga akan ikut terganti

// tetapi jika kita menggunakan clone, hal tersebut tidak akan terjadi
// karena jadi jika kita mengganti isi dari property object yang menclone ( object B ),
// property object yang diclone ( object A ) tidak akan ikut terganti

require 'User.php';

$budi = new User();
$budi->setEmail('budi@email.com');
$budi->setPassword('12121221');

$andri = $budi; // ini adalah cara untuk mencopy object budi ke andri
$andri->setEmail('andri@email.com');

$bowo = clone $budi; // ini adalah cara untuk menclone object budi ke bowo
$bowo->setEmail('bowo@email.com');

var_dump($budi);
echo '<br/>';
var_dump($andri);
echo '<br/>';
var_dump($bowo);
