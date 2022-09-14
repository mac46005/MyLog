<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\DB;
use MyLog_ClassLib\App\Container;
use MyLog_ClassLib\DB\Enums\TABLES_Enum;

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
        if($result = $this->db->query(MyLog_SqlStatements::select_WHERE_Id(
            $this->tableName,
            ['name','category_id','color'],
            'id',
            $id
        ))){
            return $result->fetchAll()[0];
        }

        return false;
    }

    public function readAll(): mixed
    {
        if($result = $this->db->query(MyLog_SqlStatements::SubCategories_SELECT_ALL)){
            return $result->fetchAll();
        }

        return false;
    }

    public function write($obj): bool
    {
        if($this->db->exec(MyLog_SqlStatements::insert_Statement(
            $this->tableName,
            ['name', 'category_id', 'color'],
            [$obj->name,$obj->category_id,$obj->color]
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
        $result = $this->db->query($sql);
        return $result->fetchAll();
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