<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\Models\DB_Models;

use MyLog_ClassLib\Models\DB_Models\Interfaces\IDBAccess;

abstract class PDO_SqliteAccess implements IDBAccess{
    protected ?\PDO $db = NULL;
    public function __construct(
        protected string $configFilePath = ''
    )
    {
        
    }

    public function connect()
    {
        if($dbIniFile = parse_ini_file($this->configFilePath)){
            if($filepath = $dbIniFile[])
        }
    }
}