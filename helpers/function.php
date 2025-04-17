<?php

if(!function_exists('dd')) {
    function dd($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        die;
    }
}

if(!function_exists('view')) {
    function view($path, $data = []) {
        extract($data);
        require_once __DIR__ . '/../views/' . $path . '.php';
    }
}