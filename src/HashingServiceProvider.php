<?php

namespace PittacusW\Hashing;

use Illuminate\Support\ServiceProvider;

class HashingServiceProvider extends ServiceProvider {
 public function boot() {
  app('hash')->extend('aes256', function() {
   return new Hasher();
  });
 }
}
