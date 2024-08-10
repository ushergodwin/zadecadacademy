<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

function process_curl($data, $api_url)
{
    $response = Http::post($api_url, $data);
    return $response->body();
}

function getUploadUrl($file)
{
    return asset('uploads/' . $file);
}

function redirect_page($url)
{
    return redirect($url);
}

function log_message($msg = null)
{
    if (!empty($msg)) {
        session(['msg' => $msg]);
    } else {
        $val = session('msg');
        session(['msg' => '']);
        return $val;
    }
}

function get_countries($countries)
{
    $arr = [];
    foreach ($countries as $value) {
        $arr[] = $value;
    }
    return $arr;
}

function truncate($text, $chars = 100)
{
    if (strlen($text) <= $chars) {
        return $text;
    }
    $text = $text . " ";
    $text = substr($text, 0, $chars);
    $text = substr($text, 0, strrpos($text, ' '));
    $text = $text . "...";
    return $text;
}

function slugify($string)
{
    $string = preg_replace('~[^\pL\d]+~u', '-', $string);
    $string = trim($string, '-');
    $string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
    $string = strtolower($string);
    $string = preg_replace('~[^-\w]+~', '', $string);
    return $string;
}

function getSize($bytes)
{
    if ($bytes >= 1073741824) {
        $bytes = number_format($bytes / 1073741824) . ' GB';
    } elseif ($bytes >= 1048576) {
        $bytes = number_format($bytes / 1048576) . ' MB';
    } elseif ($bytes >= 1024) {
        $bytes = number_format($bytes / 1024) . ' KB';
    } elseif ($bytes > 1) {
        $bytes = $bytes . ' B';
    } elseif ($bytes == 1) {
        $bytes = $bytes . ' B';
    } else {
        $bytes = '0 B';
    }
    return $bytes;
}
