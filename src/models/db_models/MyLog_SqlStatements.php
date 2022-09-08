<?php

declare(strict_types=1);

namespace MyLog_ClassLib\Models\DB_Models;

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
    //* Im sure there is a better way to save sql statements somewhere but...

    ## Table Creation #####
    public const CREATE_TABLE_Categorys = <<<SQL
    CREATE TABLE categorys (
        id INTEGER,
        name TEXT,
        color TEXT,
        PRIMARY KEY(id AUTOINCREMENT)
    )
    SQL;

    public const CREATE_TABLE_LogItems = <<<SQL
    CREATE TABLE logItems (
        id INTEGER,
        PRIMARY KEY(id AUTOINCREMENT)
    )
    SQL;

    ########################
}
