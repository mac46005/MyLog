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

        return <<<SQL
        INSERT INTO $table (${implode(',',$col)})
        VALUES(${implode(',',$formattedArray)})
        SQL;
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
        category_id INTEGER
    )
    SQL;
    public const CREATE_TABLE_LogItems = <<<SQL
    CREATE TABLE logItems (
        id INTEGER,
        description,
        timestamp TEXT,
        category_id INTEGER,
        PRIMARY KEY(id AUTOINCREMENT)
    )
    SQL;
    
    //!########################################################

    //* LogItem Statements

    public const LogItem_ReadAll = <<<SQL

    SQL;



    //* Categories Statements
    public const Categories_SELECT_ALL = <<<SQL
    SELECT id, name
    FROM categories
    SQL;
    //* Subcategories Statements
}
