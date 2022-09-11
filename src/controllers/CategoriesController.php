<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\Controllers;
use MyLog_ClassLib\App\Container;
use MyLog_ClassLib\App\View;

class CategoriesController{
    public function __construct(
        private Container $container,
    )
    {

    }

    public function index(){
        return View::create_View('categories/index');
    }
}