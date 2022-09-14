<?php
use MyLog_ClassLib\App\Container;
use MyLog_ClassLib\App\Application;
use MyLog_ClassLib\Controllers\CategoriesController;
use MyLog_ClassLib\Controllers\HomeController;
use MyLog_ClassLib\DB\Categories_DbAccess;
use MyLog_ClassLib\DB\LogItems_DbAccess;
use MyLog_ClassLib\DB\SubCategories_DbAccess;
use MyLog_ClassLib\DB\Interfaces\IDBAccess;
use MyLog_ClassLib\Models\DB_Models\Categorys_DbAccess;

require '../vendor/autoload.php';

define('VIEW_PATH', __DIR__ . '/../src/views');
define('CONFIG_PATH', __DIR__ . '/../config');



$MyApplication = new Application(
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']]
);


$MyApplication::$router
    ->get('/', [\MyLog_ClassLib\Controllers\HomeController::class, 'index'])



    // * CATEGORIES
    ->get('/categories/index',[\MyLog_ClassLib\Controllers\CategoriesController::class, 'index'])
    ->get('/categories/form',[\MyLog_ClassLib\Controllers\CategoriesController::class,'form'])
    ->post('/categories/submit-form',[\MyLog_ClassLib\Controllers\CategoriesController::class,'postForm'])


    // * SUBCATEGORIES
    ->get('/subcategories/index',[\MyLog_ClassLib\Controllers\SubCategoriesController::class,'index'])
    ->get('/subcategories/form',[\MyLog_ClassLib\Controllers\SubCategoriesController::class, 'form']);

$MyApplication::$container
    ->set(HomeController::class, HomeController::class)
    ->set(CategoriesController::class, CategoriesController::class)
    ->set(LogItems_DbAccess::class, function(Container $c){
        return new LogItems_DbAccess(
            $c->get(Container::class),
            CONFIG_PATH . '/dbConn.ini'
        );
    })
    ->set(Categories_DbAccess::class, function(Container $c){
        return new Categories_DbAccess(
            $c->get(Container::class),
            CONFIG_PATH . '/dbConn.ini'
        );
    })
    ->set(SubCategories_DbAccess::class, function(Container $c){
        return new SubCategories_DbAccess(
            $c->get(Container::class),
            CONFIG_PATH . '/dbConn.ini'
        );
    });


$MyApplication->run();