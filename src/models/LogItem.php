<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\Models;

class LogItem{
    public function __construct(
        public int $id = 0,
        public string $description = "",
        public string $timestamp = "",
        public int $category_id = 0,
        public int $subcategory_id = 0
    )
    {
        $this->id = (isset($_REQUEST['id']))? $_REQUEST['id'] : 0;
        $this->description = (isset($_REQUEST['description']))? $_REQUEST['description'] : "";
        $this->timestamp = (isset($_REQUEST['timestamp']))? $_REQUEST['timestamp'] : "";
        $this->category_id = (isset($_REQUEST['category_id']))? $_REQUEST['category_id'] : 0;
        $this->subcategory_id = (isset($_REQUEST['subcategory_id']))? $_REQUEST['subcategory_id'] : 0;
    }   
}