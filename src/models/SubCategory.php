<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\Models;

class SubCategory{
    public int $id = 0;
    public string $name = "";
    public int $category_id = 0;
    public function __construct()
    {
        $this->id = (isset($_REQUEST['id']))? (int)$_REQUEST['id'] : 0;
        $this->name = (isset($_REQUEST['name']))? $_REQUEST['name'] : "";
        $this->category_id = (isset($_REQUEST['category_id']))? $_REQUEST['category_id'] : 0;
    }
}