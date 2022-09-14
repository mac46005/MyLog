<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\Controllers;

use MyLog_ClassLib\App\Container;
use MyLog_ClassLib\App\View;
use MyLog_ClassLib\DB\Enums\CRUD_Enum;
use MyLog_ClassLib\DB\SubCategories_DbAccess;
use MyLog_ClassLib\Models\SubCategory;

class SubCategoriesController{
    public function __construct(
        private Container $container,
        private SubCategories_DbAccess $subCategories_DbAccess
    )
    {
        
    }

    public function index(){
        $subcategoriesList = $this->subCategories_DbAccess->readAll();
        return View::create_View('subcategories/index',['subcategoriesList' => $subcategoriesList]);
    }

    public function form(){
        $categoryList = $this->subCategories_DbAccess->query(
            "SELECT id,name FROM categories"
        );
        return View::create_View('subcategories/subcategoryForm',['categoryList' => $categoryList]);
    }

    /**
     * @request post
     */
    public function submitForm(){
        $result = "";
        $crud_op = $_REQUEST['crud_op'];
        
        // CHecks what operation to perform
        if($crud_op == CRUD_Enum::WRITE){
            // writes new data to db
            $result = $this->subCategories_DbAccess->write(new SubCategory());//TODO:<= CONTAINER to create model?
        }else{
            // updates data to db
        }

        if($result == false){
            // means db was not able to perform task for a given reason
            // show error message stating proccess could not be complete
            // although person will not be able to do anything because 
            // it is not his/her issue to fix problem
            // 
            // or maybe it can send it back to user due to error of user
            // not filling in form correctly
        }else{
            //send user back to index of subcategories
            header('location:/subcategories/index');
        }
    }
}