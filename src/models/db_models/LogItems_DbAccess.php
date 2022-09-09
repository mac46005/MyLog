<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\Models\DB_Models;

use MyLog_ClassLib\App\Container;
use MyLog_ClassLib\Models\LogItem;

class LogItems_DbAccess extends PDO_SqliteAccess{
    public function __construct(
        private Container $container, string $configFilePath
    )
    {
        parent::__construct($configFilePath);
        
    }

    public function readone($id){
        try {
            $pdoStatement = $this->db->query(MyLog_SqlStatements::select_WHERE_Id('',[],'id',$id));
            $logItem = $pdoStatement->fetchAll(\PDO::FETCH_CLASS,LogItem::class)[0];
            return $logItem;
        } catch (\PDOException $th) {
            throw $th;
        }
    }

    public function readAll(): mixed
    {
        try {
            $pdoStmt = $this->db->query();
            $list = $pdoStmt->fetchAll();
        } catch (\PDOException $th) {
            throw $th;
        }
        return false;
    }

    public function write($obj): bool
    {
        try {
            //code...
        } catch (\PDOException $th) {
            throw $th;
        }
        return false;
    }

    public function delete($id): bool
    {
        try {
            //code...
        } catch (\PDOException $th) {
            throw $th;
        }
        return false;
    }

    public function update($obj): bool
    {
        try {
            //code...
        } catch (\PDOException $th) {
            throw $th;
        }
        return false;
    }

    public function query($sql): mixed
    {
        try {
            //code...
        } catch (\PDOException $th) {
            throw $th;
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