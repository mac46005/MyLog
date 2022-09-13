<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\Controllers;

use MyLog_ClassLib\App\Container;
use MyLog_ClassLib\App\View;
use MyLog_ClassLib\DB\SubCategories_DbAccess;

class SubCategoriesController{
    public function __construct(
        private Container $container,
        private SubCategories_DbAccess $subCategories_DbAccess
    )
    {
        
    }

    public function index(){
        return View::create_View('subcategories/index');
    }

    public function form(){
        return View::create_View('subcategories/subcategoryForm');
    }
}