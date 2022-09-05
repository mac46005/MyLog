<?php

use MyLog_ClassLib\App\Application;
use MyLog_ClassLib\Controllers\HomeController;

require '../vendor/autoload.php';

define('VIEW_PATH', __DIR__ . '/../src/views');




$MyApplication = new Application(
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']]
);


$MyApplication::$router
    ->get('/', [\MyLog_ClassLib\Controllers\HomeController::class, 'index']);

$MyApplication::$container
    ->set(HomeController::class, HomeController::class);


$MyApplication->run();