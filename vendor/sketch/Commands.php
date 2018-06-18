<?php

namespace sketch;

class Commands
{
    private static $listCommands = [];

    public static function add(CommandObj $obj)
    {
        self::$listCommands[] = $obj;
    }

    private static function removeCurrent()
    {
        if (count(self::$listCommands)===0){
            return false;
        }
        unset(self::$listCommands[0]);
        array_values(self::$listCommands);
        return true;
    }

    public static function runNext()
    {
        if (count(self::$listCommands)===0){
            return false;
        }
        $obj = array_shift(self::$listCommands);
        $obj->run();
        return true;
    }

    public static function run()
    {
        while (self::runNext()) {}
    }
}
