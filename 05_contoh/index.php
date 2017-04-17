<?php

require 'app/Mobil.php';
require 'app/Validator.php';

$rules = array('warna' => 'required', 'merk' => 'required', 'roda' => 'required|equal:4');

$data = array('warna' => 'Merah', 'merk' => 'Lykan Hypersport', 'roda' => 4);

$test = new Validator();

if ($test->validate($data, $rules) === true) {
    $car = new Mobil();

    $car->setWarna($data['warna'])
        ->setMerk($data['merk'])
        ->setRoda($data['roda']);

    echo $car->viewResult();
    echo "<hr>";

    echo '<pre>';
        return print_r($car);
    echo '</pre>';
} else {
    echo '<pre>';
        return print_r($test->error());
    echo '</pre>';
}
