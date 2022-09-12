<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\DB;
use MyLog_ClassLib\App\Container;
class SubCategories_DbAccess extends PDO_SqliteAccess{

    public function __construct(
        private Container $container,
        string $configFilePath
    )
    {
        parent::__construct($configFilePath);
    }

    public function readOne($id): mixed
    {
        
    }

    public function readAll(): mixed
    {
        
    }

    public function write($obj): bool
    {
        
    }

    public function delete($id): bool
    {
        
    }
    public function update($obj): bool
    {
        
    }

    public function query($sql): mixed
    {
        
    }

}