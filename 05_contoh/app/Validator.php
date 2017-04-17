<?php

class Validator
{
    private $error = array();

    public function validate(array $data, array $rules)
    {
      $status = true;

      foreach ($rules as $item => $ruleset) {
          $ruleset = explode('|', $ruleset);

          foreach ($ruleset as $rule) {
              $pos = strpos($rule, ':');

              if ($pos != false) {
                  $parameter = substr($rule, $pos + 1);
                  $rule = substr($rule, 0, $pos);
              } else {
                  $parameter = '';
              }

              $namaMethod = 'cek'.ucfirst($rule);

              $value = isset($data[$item]) ? $data[$item] : null;

              if (method_exists($this, $namaMethod)) {
                  $this->$namaMethod($item, $value, $parameter) or $status = false;
              }
          }
      }

      return $status;
    }

    public function error()
    {
        return $this->errors;
    }

    private function cekRequired($item, $value, $parameter)
    {
        if ($value === '' || $value === null) {
            $this->errors[$item][] = $item.' harus diisi';
            return false;
        }
        return true;
    }

    private function cekEqual($item, $value, $parameter)
    {
        if ($value != $parameter) {
            $this->errors[$item][] = $item.' harus sama dengan '.$parameter;
            return false;
        }
        return true;
    }
}
