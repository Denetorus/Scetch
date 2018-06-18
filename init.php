<?php

define('ROOT', dirname(__FILE__));
define('VIEW', ROOT.'/view');
define('CONT', ROOT.'/controller');
define('MODEL', ROOT.'/model');
define('OBJECT', ROOT.'/object');
define('VENDOR', ROOT.'/vendor');
define('SIGN', ROOT.'/sign');
define('SKETCH', ROOT.'/vendor/sketch');

require_once(VENDOR.'/AutoLoad.php');

$commandsList = [
    [
        'command' => new \object\DBMain\migration\Migrate(),
        'params' => []
    ],
    [
        'command' => new sign\SignMain(),
        'params' => [ 'router' => new router\RouterMain() ]
    ]
];

$commands = new sketch\Commands();
$commands->run($commandsList);



