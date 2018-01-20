<?php

if (!function_exists('mg_base_url')) {

    function mg_base_url()
    {
        return '/vendor/tradetracker/';
    }

}

if (!function_exists('base_url')) {

    function base_url($path = null)
    {
        return $path ? url($path) : url('/');
    }

}

if (!function_exists('mg_url')) {

    function mg_url($path = null)
    {
        return base_url(mg_base_url() . $path);
    }

}

if (!function_exists('mg_path')) {

    function mg_path($path = null)
    {
        return realpath(__DIR__ . '/../' . $path);
    }

}

if (!function_exists('mg_public_path')) {

    function mg_public_path($path = null)
    {
        return public_path(mg_base_url() . $path);
    }

}

if (!function_exists('mg_config_path')) {

    function mg_config_path($path = null)
    {
        return mg_path('config/' . $path);
    }

}

