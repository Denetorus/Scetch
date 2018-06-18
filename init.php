<?php

use sketch\Commands;
use sketch\CommandObj;

include "config_sketch.php";

define("CONTROLLERS_PATH", CONT);

require_once(VENDOR.'/autoLoad.php');


Commands::add(
    new CommandObj(
        new sign\SignMain(),
        [
            'router' => new router\RouterMain()
        ]
    )
);

Commands::run();
