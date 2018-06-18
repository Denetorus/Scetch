<?php

spl_autoload_register("AutoLoad");

function AutoLoad($className)
{
    $path = $className;
/*    if ($lastNsPos = strrpos($className, '\\')) {
        $className = substr($className, $lastNsPos + 1);
    }*/

    //echo $className.'<br>';

    $dirs = [
        '',
        '/controller',
        '/database',
        '/model',
        '/object',
        '/sign',
        '/vendor',
        '/vendor/sketch',
        '/vendor/sketch/sign',
        '/vendor/sketch/sign/model',
    ];

    $found = false;
    foreach ($dirs as $dir) {
        $fileName = ROOT . $dir. '/'. $path . '.php';
        //echo $fileName.'<br>';
        if (is_file($fileName)) {

            //echo '---------------------------<br>';

            require_once($fileName);
            $found = true;
            break;
        }
    }
    if (!$found) {
        throw new Exception('Нет файла класса для загрузки: ' . $path );
    }
    return true;
}

