<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\Controllers;
use MyLog_ClassLib\App\Container;
use MyLog_ClassLib\App\View;
use MyLog_ClassLib\DB\Categories_DbAccess;
use MyLog_ClassLib\DB\Enums\CRUD_Enum;
use MyLog_ClassLib\Models\Category;

class CategoriesController{
    public function __construct(
        private Container $container,
        private Categories_DbAccess $categories_DbAccess
    )
    {

    }

    public function index(){
        return View::create_View('categories/index');
    }

    public function form(){
        return View::create_View('categories/categoryForm');
    }

    public function postForm(){
        $crud_op = $_REQUEST['crud_op'];
        $categoryItem = new Category();
        if($crud_op == CRUD_Enum::WRITE){
            $this->categories_DbAccess->write($categoryItem);
            header("location:/categories/index");
        }else{
            $this->categories_DbAccess->update($categoryItem);

        }
    }
}