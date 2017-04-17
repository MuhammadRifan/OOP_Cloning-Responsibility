<?php

function getHash($string)
{ // method yang digunakan untuk merubah password menjadi hash
    return hash('sha256', $string);
}
