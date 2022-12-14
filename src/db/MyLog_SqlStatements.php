<?php

declare(strict_types=1);

namespace MyLog_ClassLib\DB;

class MyLog_SqlStatements
{

    public static function selectTableNameCount_SQLStatement(string $tableName):string{
        return <<<SQL
        SELECT count(name) as nameCount
        FROM sqlite_master
        WHERE type = 'table'
        AND name = "$tableName"
        SQL;
    }


    public static function select_WHERE_Id(string $tableName, array $colNames, string $idName, mixed $id):string{
        $str_colNames = implode(',', $colNames);

        return <<<SQL
        SELECT $str_colNames
        FROM $tableName
        WHERE $idName = $id
        SQL;
    }

    public static function insert_Statement(string $table, array $col, array $colValues):string{
        $formattedArray = [];
        foreach ($colValues as $key => $value) {
            $formattedArray[] = "'$value'";
        }
        $groupedCol = implode(",",$col);
        $groupedVal = implode(",",$formattedArray);


        $stmt = <<<SQL
        INSERT INTO $table ($groupedCol)
        VALUES($groupedVal)
        SQL;


        return $stmt;
    }

    public static function delete_Statement(string $table, string $idName, string $idVal):string{
        return <<<SQL
        DELETE FROM $table
        WHERE $idName = '$idVal'
        SQL;
    }
    //* Table Creation #########################################

    public const CREATE_TABLE_Categories = <<<SQL
    CREATE TABLE categories (
        id INTEGER,
        name TEXT,
        color TEXT,
        PRIMARY KEY(id AUTOINCREMENT)
    )
    SQL;

    public const CREATE_TABLE_SubCategories = <<<SQL
    CREATE TABLE subcategories (
        id INTEGER,
        name TEXT,
        color TEXT,
        category_id INTEGER,
        PRIMARY KEY(id AUTOINCREMENT)
    )
    SQL;
    public const CREATE_TABLE_LogItems = <<<SQL
    CREATE TABLE logitems (
        id INTEGER,
        description,
        timestamp TEXT,
        category_id INTEGER,
        subcategory_id INTEGER,
        PRIMARY KEY(id AUTOINCREMENT)
    )
    SQL;
    
    //!########################################################

    //* LogItem Statements

    public const LogItem_ReadAll = <<<SQL
    SELECT id, description, timestamp, category_id, subcategory_id
    FROM logitems
    SQL;



    //* Categories Statements
    public const Categories_SELECT_ALL = <<<SQL
    SELECT id, name, color
    FROM categories
    SQL;
    //* Subcategories Statements
    public const SubCategories_SELECT_ALL = <<<SQL
    SELECT id, name, category_id, color
    FROM subcategories
    SQL;
}
