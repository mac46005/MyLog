<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\DB;

use MyLog_ClassLib\DB\Enums\DBIniFile_Enum;
use MyLog_ClassLib\DB\Exceptions\DB_IniConfigException;
use MyLog_ClassLib\DB\Interfaces\IDBAccess;

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
            if($filepath = $dbIniFile[DBIniFile_Enum::OPTIONS[6]]){
                $this->db = new \PDO("sqlite:" . __DIR__ . '/../' . $filepath);
            }else{
                throw new DB_IniConfigException("$filepath not found!");
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