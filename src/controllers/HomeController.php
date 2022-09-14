<?php

declare(strict_types = 1);
namespace MyLog_ClassLib\Controllers;

use MyLog_ClassLib\App\Container;
use MyLog_ClassLib\App\View;
use MyLog_ClassLib\DB\LogItems_DbAccess;
use MyLog_ClassLib\DB\MyLog_SqlStatements;
use MyLog_ClassLib\Models\LogItem;

class HomeController{
    public function __construct(
        private Container $container,
        private LogItems_DbAccess $logItems_DbAccess
        )
    {
        
    }

    public function index(){

        $categoriesList = $this->logItems_DbAccess->query(MyLog_SqlStatements::Categories_SELECT_ALL);
        $subcategoriesList = $this->logItems_DbAccess->query(MyLog_SqlStatements::SubCategories_SELECT_ALL);

        $logItemsList = $this->logItems_DbAccess->query(
            "SELECT category_id, subcategory_id, description, timestamp FROM logitems ORDER BY id DESC LIMIT 10"
        );

        return View::create_View('index',['categoriesList' => $categoriesList, 'subcategoriesList' => $subcategoriesList, 'logitemsList' => $logItemsList]);
    }


    

    public function submitForm(){
        $this->logItems_DbAccess->write(new LogItem());
        
        header("location:/");
    }
}