<?php

require 'Mobil.php';

$car = new Mobil();
$car->setWarna("Merah");
$car->setMerk("Toyota");
$car->roda = 4;

$mobil1 = $car;
$mobil1->setMerk("Lamborghini");

$mobil2 = clone $car;
$mobil2->setMerk("Lykan");

$car->cekMobil();
echo "<hr>";
var_dump($car);
echo "<hr>";

$mobil1->cekMobil();
echo "<hr>";
var_dump($mobil1);
echo "<hr>";

$mobil2->cekMobil();
echo "<hr>";
var_dump($mobil2);
