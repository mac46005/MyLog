<?php

declare(strict_types=1);

namespace MyLog_ClassLib\DB;

use MyLog_ClassLib\App\Container;
use MyLog_ClassLib\DB\Enums\TABLES_Enum;
use MyLog_ClassLib\DB\MyLog_SqlStatements;


class Categories_DbAccess extends PDO_SqliteAccess
{

    private string $tableName = 'categories';

    public function __construct(
        private Container $container,
        string $configFilePath
    ) {
        parent::__construct($configFilePath);
        $this->initialSetup();
    }

    public function readOne($id): mixed
    {
        $pdoStatement = $this->db->query(MyLog_SqlStatements::select_WHERE_Id($this->tableName, ['id', 'name'], 'id', $id));
        $logItem = $pdoStatement->fetchAll(\PDO::FETCH_CLASS, Category::class)[0];
        return $logItem;
    }

    public function readAll(): mixed
    {
        $pdoStmt = $this->db->query(MyLog_SqlStatements::Categories_SELECT_ALL);
        $list = $pdoStmt->fetchAll();
        return $list;
        return false;
    }

    public function write($obj): bool
    {

        $sqlStmt = MyLog_SqlStatements::insert_Statement($this->tableName, ['name', 'color'], [$obj->name, $obj->color]);
        if ($this->db->exec($sqlStmt)) {
            return true;
        }
        return false;
    }

    public function delete($id): bool
    {
        $sqlStmt = MyLog_SqlStatements::delete_Statement($this->tableName, 'id', $id);
        if ($this->db->exec($sqlStmt)) {
            return true;
        }

        return false;
    }

    public function update($obj): bool
    {

        return false;
    }

    public function query($sql): mixed
    {
        if ($result = $this->db->query($sql)) {
            return $result;
        } else {
            return false;
        }
    }





    public function initialSetup(): self
    {
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
