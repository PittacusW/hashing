<?php

namespace PittacusW\Hashing;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;

class Hasher implements HasherContract {

 public function info($hashedValue) {
  return password_get_info($hashedValue);
 }

 public function make($value, array $options = []) {
  $hash = Crypt::encryptString(bcrypt($value));

  return $hash;
 }

 public function check($value, $hashedValue, array $options = []) {
  if (strlen($hashedValue) === 0) {
   return FALSE;
  }

  return Crypt::decryptString($hashedValue) === bcrypt($value);
 }

 public function needsRehash($hashedValue, array $options = []) {
  return FALSE;
 }
}
