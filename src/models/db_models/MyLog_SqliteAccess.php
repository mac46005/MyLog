<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\Models\DB_Models;

use MyLog_ClassLib\Models\DB_Models\PDO_SqliteAccess;

class MyLog_SqliteAccess extends PDO_SqliteAccess{
    public function __construct(
        private Container $container, string $configFilePath
    )
    {
        parent::__construct($configFilePath);
        
    }

    public function readone($id){
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function readAll(): mixed
    {
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        return false;
    }

    public function write($obj): bool
    {
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        return false;
    }

    public function delete($id): bool
    {
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        return false;
    }

    public function update($obj): bool
    {
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        return false;
    }

    public function query($sql): mixed
    {
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        return false;
    }





    public function initialSetup(){
        $this->connect();
        $pdoStatement = $this->db->query(MyLog_SqlStatements::CREATE_TABLE_Categorys);

        $result = $pdoStatement->fetchAll()[0]['nameCount'];

        if($result == 0){
            //$this->db->exec(MyLog_SqlStatements::);
        }
    }
}