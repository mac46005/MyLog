<?php
use MyLog_ClassLib\App\Container;
use MyLog_ClassLib\App\Application;
use MyLog_ClassLib\Controllers\HomeController;
use MyLog_ClassLib\DB\Categories_DbAccess;
use MyLog_ClassLib\DB\Categorys_DbAccess;
use MyLog_ClassLib\DB\Interfaces\IDBAccess;
use MyLog_ClassLib\DB\LogItems_DbAccess;
use MyLog_ClassLib\Models\DB_Models\Interfaces\IDBAccess as InterfacesIDBAccess;

require '../vendor/autoload.php';

define('VIEW_PATH', __DIR__ . '/../src/views');
define('CONFIG_PATH', __DIR__ . '/../config');



$MyApplication = new Application(
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']]
);


$MyApplication::$router
    ->get('/', [\MyLog_ClassLib\Controllers\HomeController::class, 'index']);

$MyApplication::$container
    ->set(HomeController::class, HomeController::class)
    ->set(IDBAccess::class, function(Container $c){
        return new LogItems_DbAccess(
            $c->get(Container::class),
            CONFIG_PATH . 'dbConn.ini'
        );
    })
    ->set(IDBAccess::class, function(Container $c){
        return new Categories_DbAccess(
            $c->get(Container::class),
        CONFIG_PATH . 'dbConn.ini'
        );
    });


$MyApplication->run();