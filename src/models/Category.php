<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\Models;

class Category{
    public int $id = 0;
    public string $name =  "";
    public string $color = "";
    public function __construct()
    {
        $this->id = (isset($_REQUEST['id']))? (int)$_REQUEST['id']:0;
        $this->name = (isset($_REQUEST['name']))? $_REQUEST['name'] : "";
        $this->color = (isset($_REQUEST['color']))? $_REQUEST['color'] : "";
    }
}