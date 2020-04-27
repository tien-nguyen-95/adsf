<?php

namespace App\Helpers;

if (!function_exists('sale')) {
    function sale($price, $promotion)
    {
     return number_format(round(($price - $price*$promotion/100),0));
    }
  }
