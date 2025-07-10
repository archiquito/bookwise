<?php
require 'Flash.php';

function view($view, $data = [])
{
    foreach ($data as $key => $value) {
        $$key = $value;
    }

    require './views/template/app.php';
};

function dd(...$data)
{
    dump($data);
    die();
};

function dump(...$data)
{
    echo "<pre>";
    var_dump($data);
    "</pre>";
};

function abort($status)
{
    http_response_code($status);
    view($status);
    die();
};

function cleanSpecialCharacters($string)
{
    return preg_replace("/[^A-Za-z0-9\-\']/", '', $string);
}

function flash()
{
    return new Flash();
}

function config($key = null)
{
    $config = require 'config.php';
    if (strlen($key) > 0) {
        return $config[$key];
    }
    return $config;
}

function createStars($fullStars, $halfStars, $emptyStars)
{
    for ($i = 0; $i < $fullStars; $i++) {
        echo '&#9733;';
    }

    // Exibe a meia estrela, se houver
    if ($halfStars) {
        echo '&#x2bea;';
    }

    // Loop para exibir as estrelas vazias
    for ($i = 0; $i < $emptyStars; $i++) {
        echo '&#9734;';
    }
}
