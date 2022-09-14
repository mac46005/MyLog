<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\DB;

use MyLog_ClassLib\App\Container;
use MyLog_ClassLib\DB\Enums\TABLES_Enum;
use MyLog_ClassLib\Models\LogItem;

class LogItems_DbAccess extends PDO_SqliteAccess{
    private string $tableName = 'logitems';
    public function __construct(
        private Container $container, string $configFilePath
    )
    {
        parent::__construct($configFilePath);
        $this->initialSetup();
        
    }

    public function readone($id): mixed{
            $pdoStatement = $this->db->query(MyLog_SqlStatements::select_WHERE_Id('',[],'id',$id));
            $logItem = $pdoStatement->fetchAll(\PDO::FETCH_CLASS,LogItem::class)[0];
            return $logItem;
    }

    public function readAll(): mixed
    {
        if($result = $this->db->query(MyLog_SqlStatements::LogItem_ReadAll)){
            return $result->fetchAll();
        }
        return false;
    }

    public function write($obj): bool
    {
        if($this->db->exec(MyLog_SqlStatements::insert_Statement(
            TABLES_Enum::LOGITEMS,
            ['description','timestamp','category_id','subcategory_id'],
            [
                $obj->description,
                $obj->timestamp,
                $obj->category_id,
                $obj->subcategory_id
            ]
        ))){
            return true;
        }
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
        if($result = $this->db->query($sql)){
            return $result->fetchAll();
        }
        return false;
    }





    public function initialSetup(): self{
        $this->connect();
        $pdoStatement = $this->db->query(MyLog_SqlStatements::selectTableNameCount_SQLStatement(TABLES_Enum::LOGITEMS));
        $result = $pdoStatement->fetchAll()[0]['nameCount'];
        if ($result == 0) {
            $this->db->exec(MyLog_SqlStatements::CREATE_TABLE_LogItems);
        }


        $pdoStatement = $this->db->query(MyLog_SqlStatements::selectTableNameCount_SQLStatement(TABLES_Enum::CATEGORIES));
        $result = $pdoStatement->fetchAll()[0]['nameCount'];
        if ($result == 0) {
            $this->db->exec(MyLog_SqlStatements::CREATE_TABLE_Categories);
        }

        $pdoStatement = $this->db->query(MyLog_SqlStatements::selectTableNameCount_SQLStatement(TABLES_Enum::SUBCATEGORIES));
        $result = $pdoStatement->fetchAll()[0]['nameCount'];
        if ($result == 0) {
            $this->db->exec(MyLog_SqlStatements::CREATE_TABLE_SubCategories);
        }

        return $this;
    }
}