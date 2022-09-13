<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\DB;
use MyLog_ClassLib\App\Container;
class SubCategories_DbAccess extends PDO_SqliteAccess{
    private string $tableName = 'subcategories';
    public function __construct(
        private Container $container,
        string $configFilePath
    )
    {
        parent::__construct($configFilePath);
        $this->initialSetup();
    }

    public function readOne($id): mixed
    {
        
    }

    public function readAll(): mixed
    {
        
    }

    public function write($obj): bool
    {
        return false;
    }

    public function delete($id): bool
    {
        return false;
    }
    public function update($obj): bool
    {
        return false;
    }

    public function query($sql): mixed
    {
        
    }


    public function initialSetup(){
        $this->connect();
        $pdoStatement = $this->db->query(MyLog_SqlStatements::selectTableNameCount_SQLStatement($this->tableName));

        $result = $pdoStatement->fetchAll()[0]['nameCount'];

        if($result == 0){
            $this->db->exec(MyLog_SqlStatements::CREATE_TABLE_SubCategories);
        }
    }
}