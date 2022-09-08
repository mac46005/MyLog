<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\Models\DB_Models;

use MyLog_ClassLib\Models\DB_Models\Enums\DBIniFile_Enum;
use MyLog_ClassLib\Models\DB_Models\Interfaces\IDBAccess;

abstract class PDO_SqliteAccess implements IDBAccess{
    protected ?\PDO $db = NULL;
    public function __construct(
        protected string $configFilePath = ''
    )
    {
        $this->connect();
    }

    public function connect()
    {
        if($dbIniFile = parse_ini_file($this->configFilePath)){
            if($filepath = $dbIniFile[DBIniFile_Enum::OPTIONS]){
                $this->db = new \PDO("sqlite:" . __DIR__ . '/../' . $filepath);
            }else{
                //throw new DB_IniConfigException();
            }
        }else{
            throw new \PDOException("Failed to connect to sqlite file");
        }
    }

    public function __destruct()
    {
        if($this->db){
            $this->db = NULL;
        }
    }
}