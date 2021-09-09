<?php

namespace PittacusW\Hashing;

use Illuminate\Contracts\Hashing\Hasher as HasherContract;

class Hasher implements HasherContract {

 public function info($hashedValue) {
  return password_get_info($hashedValue);
 }

 public function make($value, array $options = []) {
  $hash = hash('aes-256-gcm', bcrypt($value));

  return $hash;
 }

 public function check($value, $hashedValue, array $options = []) {
  if (strlen($hashedValue) === 0) {
   return FALSE;
  }

  return $hashedValue === md5($value);
 }

 public function needsRehash($hashedValue, array $options = []) {
  return FALSE;
 }
}
