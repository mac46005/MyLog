<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\Models;

class Category{
    public int $id = (isset($_GET['id']))? $_GET['id'] : 0;
    public string $name = (isset($_GET['name']))? $_GET['name'] : "";
    public string $color = (isset($_GET['color']))? $_GET['color'] : "";
}