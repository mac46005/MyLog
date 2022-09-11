<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\DB;
use MyLog_ClassLib\App\Container;
use MyLog_ClassLib\DB\MyLog_SqlStatements;


class Categories_DbAccess extends PDO_SqliteAccess{

    private string $tableName = 'categories';

    public function __construct(
        private Container $container, string $configFilePath
    )
    {
        parent::__construct($configFilePath);
        
    }

    public function readone($id){
        try {
            $pdoStatement = $this->db->query(MyLog_SqlStatements::select_WHERE_Id($this->tableName,['id','name'],'id',$id));
            $logItem = $pdoStatement->fetchAll(\PDO::FETCH_CLASS,Category::class)[0];
            return $logItem;
        } catch (\PDOException $th) {
            throw $th;
        }
    }

    public function readAll(): mixed
    {
        try {
            $pdoStmt = $this->db->query(MyLog_SqlStatements::Categories_SELECT_ALL);
            return $list = $pdoStmt->fetchAll();
        } catch (\PDOException $th) {
            throw $th;
        }
        return false;
    }

    public function write($obj): bool
    {

        try {
            $sqlStmt = MyLog_SqlStatements::insert_Statement($this->tableName,['name'],[$obj->name]);
            if($this->db->exec($sqlStmt)){
                return true;
            }
        } catch (\PDOException $th) {
            throw $th;
        }
        return false;
    }

    public function delete($id): bool
    {
        try {
            $sqlStmt = MyLog_SqlStatements::delete_Statement($this->tableName,'id',$id);
            if($this->db->exec($sqlStmt)){
                return true;
            }
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
            if($result = $this->db->query($sql)){
                return $result;
            }else{

            }
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