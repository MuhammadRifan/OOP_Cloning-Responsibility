<?php

class Mobil
{
    private $warna;
    private $merk;
    private $roda;

    public function setWarna($warna)
    {
        $this->warna = $warna;
        return $this;
    }

    public function setMerk($merk)
    {
        $this->merk = $merk;
        return $this;
    }

    public function setRoda($roda)
    {
        $this->roda = $roda;
        return $this;
    }

    public function viewResult()
    {
      $warna = $this->warna;
      $merk = $this->merk;
      return "Mobil anda berwarna $warna, dan bermerk $merk";
    }
}
