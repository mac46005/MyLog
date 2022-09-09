<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\Models;

class LogItem{
    public function __construct(
        public int $id = 0,
        public string $description,
        public string $timestamp,
        public int $category_id = 0
    )
    {
        
    }   
}