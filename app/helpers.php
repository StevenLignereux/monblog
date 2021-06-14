<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('getImage')) {
    function getImage($post, $thumb = false): string
    {
        $url = "storage/photos/{ $post->user->id }";
        if($thumb) $url .= '/thumbs';
        return asset("{$url}/{ $post->image }");
    }
}

if (!function_exists('currentRoute')) {
    function currentRoute($route): string
    {
        return Route::currentRouteNamed($route) ? ' class=current' : '';
    }
}

if (!function_exists('formatDate')) {
    function formatDate($date): string
    {
        return ucfirst(utf8_encode($date->formatLocalized('%d %B %Y')));
    }
}
