<?php

class Mobil
{
    private $warna;
    private $merk;
    public $roda;
    const BAN = 4;

    public function setWarna($warna)
    {
        $this->warna = $warna;
    }

    public function setMerk($merk)
    {
        $this->merk = $merk;
    }

    private function testMobil($roda)
    {
        if ($roda != self::BAN) {
            throw new Exception('Itu bukan termasuk mobil karena roda mobil anda = '.$roda);
        } else {
            $warna = $this->warna;
            $merk = $this->merk;
            $text = "Mobil anda berwarna $warna, dan bermerk $merk";
            echo $text;
        }
    }

    public function cekMerk()
    {
        return $this->merk;
    }

    public function cekMobil()
    {
        $roda = $this->roda;
        return isset($roda) ? $this->testMobil($roda) : $this->testMobil(0);
    }
}
