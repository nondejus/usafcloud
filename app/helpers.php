<?php

if (!function_exists('isCurrentRoute')) {
    function isCurrentRoute($route_name)
    {
        return (Route::current()->getName() === $route_name) ? true : false;
    }
}

if (!function_exists('applyActive')) {
    function applyActive($route_name)
    {
        return (Route::current()->getName() === $route_name) ? 'active' : '';
    }
}
