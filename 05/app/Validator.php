<?php

class Validator
{
    private $errors = array();

    public function validate(array $data, array $rules)
    { // method yang digunakan untuk menentukan validate mana yang akan digunakan
        $valid = true;

        // $data berisi data yang dimasukkan sebelumnya
        // $rules berisi syarat yang dimasukkan sebelumnya

        foreach ($rules as $item => $ruleset) {
            $ruleset = explode('|', $ruleset);

            // $ruleset digunakan untuk memisah syarat validate ( menggunakan explode )
            // contoh required|email, menjadi required sendiri dan email sendiri

            // $item adalah jenis dari validate yang sedang diproses, contoh jika sedang memproses email
            // maka $item berisi email, begitu juga sebaliknya

            foreach ($ruleset as $rule) { // setelah validate dipisah, kita akan memprosesnya satu persatu
                $pos = strpos($rule, ':');

                // $pos digunakan untuk mencari string dalam suatu string XD ( menggunakan )
                // contoh min:8, jika ada maka akan me return posisi hasil tersebut ( 3, dihitung mulai 0 )
                // jika tidak ada maka akan me return false

                // untuk melihat hasil dari $pos
                if ($pos != false) {
                    // jika $pos ada maka kita akan mengatur variabel parameter dan rule
                    // dalama kasus ini, hanya min:8 yang akan di proses

                    $parameter = substr($rule, $pos + 1);
                    // $parameter diisi dengan angka 8 ( menggunakan substr )
                    // $pos + 1 agar mengambil posisi string setelah : ( : diposisi 3 )

                    $rule = substr($rule, 0, $pos);
                    // $rule diisi dengan min ( menggunakan substr )
                    // 0 digunakan untuk mulai mengambil dari posisi awal
                    // dan $pos untuk menghentikan pengambilan sampai $pos
                } else {
                    // jika $pos false maka $parameter diisi kosong / null

                    $parameter = '';
                    // $rule diisi secara default
                }

                // untuk menentukan nama method yang akan dipakai sesuai dengan filter diatas
                // ucfirst digunakan untuk mengganti huruf paling depan menjadi huruf kapital
                $methodName = 'validate'.ucfirst($rule);

                // untuk menentukan isi dari variabel value
                $value = isset($data[$item]) ? $data[$item] : null;
                // jika ada maka diisi $data[$item], jika tidak maka diisi null

                // untuk mengecek apakah method yang kita maksud ada dalam class ini atau tidak
                if (method_exists($this, $methodName)) {
                    $this->$methodName($item, $value, $parameter) or $valid = false;
                    // jika ada kita akan menjalankan method tersebut sesuai dengan method yang dimaksud
                }
            }
        }

        return $valid;
    }

    public function getErrors()
    { // method yang digunakan untuk menampilkan errors
        return $this->errors;
    }

    private function validateRequired($item, $value, $parameter)
    { // method yang digunakan untuk mengecek value terisi atau tidak
        if ($value === '' || $value === null) {
            // menggunakan === ( identical ) agar data yang diproses benar - benar mirip / sama
            $this->errors[$item][] = 'The '.$item.' field is required';
            return false;
        }
        return true;
    }

    private function validateEmail($item, $value, $parameter)
    { // method yang digunakan untuk mengecek apakah penulisan email benar atau tidak
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$item][] = 'The '.$item.' field should be a valid email address';
            return false;
        }
        return true;
    }

    private function validateMin($item, $value, $parameter)
    { // method yang digunakan untuk menghitung password apakah lebih dari yang diinginkan atau tidak
        if (strlen($value) >= $parameter == false) {
            $this->errors[$item][] = 'The '.$item.' field should have a minimum lenght of '.$parameter;
            return false;
        }
        return true;
    }
}
