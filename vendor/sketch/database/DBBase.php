<?php
/**
 * Created by PhpStorm.
 * User: gfc-c
 * Date: 08.06.2018
 * Time: 17:57
 */

namespace sketch\database;

use sketch\database\DBSQL;

class DBBase
{

    public static function getInstance(){
        if (static::$DB === null) {
            static::$DB = new DBSQL();
            static::$DB->Connect(static::GetAttributes());
        };
        return static::$DB;
    }

    public static function GetAttributes(){
        return [
            'dsn' => '',
            'user' => '',
            'password' => ''
        ];
    }

}