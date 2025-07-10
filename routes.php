<?php

$controller = 'index';

if (isset($_SERVER['PATH_INFO'])) {
    $controller = str_replace(['/', '.php'], '', $_SERVER['PATH_INFO']);
};


if (parse_url($_SERVER['REQUEST_URI'])['path'] != "/") {

    $controller = str_replace(['/', '.php'], '', parse_url($_SERVER['REQUEST_URI'])['path']);
}



if (!file_exists("./controllers/{$controller}.controller.php")) {

    abort(404);
}

///header('Content-Type: application/json');

require "./controllers/{$controller}.controller.php";
