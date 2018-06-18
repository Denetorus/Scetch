<?php

use sketch\Commands;
use sketch\CommandObj;

include "config_sketch.php";

define("CONTROLLERS_PATH", CONT);

Commands::add(
    new CommandObj(
        new sign\SignMain(),
        [
            'router' => new router\RouterMain()
        ]
    )
);

Commands::run();
