<?php

use Carbon\Carbon;

if (!function_exists('formatPrice')) {
    function formatPrice($price = '0.00')
    {
        return number_format($price, 2, '.', ',') . ' KES';
    }
}

if (!function_exists('formatDateTime')) {
    function formatDateTime($dateTime, $format = 'Y-m-d H:i:s')
    {
        return Carbon::parse($dateTime)->format($format);
    }
}