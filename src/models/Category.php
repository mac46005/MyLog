<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\Models;

class Category{
    public int $id = (isset($_REQUEST['id']))? $_REQUEST['id'] : 0;
    public string $name = (isset($_REQUEST['name']))? $_REQUEST['name'] : "";
    public string $color = (isset($_REQUEST['color']))? $_REQUEST['color'] : "";
}