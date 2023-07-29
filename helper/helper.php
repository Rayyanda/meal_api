<?php

define("base_url","meal_api/");
function time_ago($timestamp) {
    $current_time = time();
    $timestamp = strtotime($timestamp);
    $time_difference = $current_time - $timestamp;
    
    // Satuan waktu dalam detik
    $seconds = 1;
    $minutes = 60;
    $hours = 3600;
    $days = 86400;
    $weeks = 604800;
    $months = 2628000;
    $years = 31536000;

    if ($time_difference < $minutes) {
        return $time_difference . " detik yang lalu";
    } elseif ($time_difference < $hours) {
        $minutes_ago = floor($time_difference / $minutes);
        return $minutes_ago . " menit yang lalu";
    } elseif ($time_difference < $days) {
        $hours_ago = floor($time_difference / $hours);
        return $hours_ago . " jam yang lalu";
    } elseif ($time_difference < $weeks) {
        $days_ago = floor($time_difference / $days);
        return $days_ago . " hari yang lalu";
    } elseif ($time_difference < $months) {
        $weeks_ago = floor($time_difference / $weeks);
        return $weeks_ago . " minggu yang lalu";
    } elseif ($time_difference < $years) {
        $months_ago = floor($time_difference / $months);
        return $months_ago . " bulan yang lalu";
    } else {
        $years_ago = floor($time_difference / $years);
        return $years_ago . " tahun yang lalu";
    }
}