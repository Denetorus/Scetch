<?php
namespace database;

use \sketch\database\DBBase;

class DBMain extends DBBase
{
    protected static $DB = null;

    public static function GetAttributes(){

        return include ('DBMainConfig.php');
    }

}