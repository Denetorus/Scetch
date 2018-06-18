<?php

namespace controller;


use sketch\CommandObj;
use sketch\Commands;

class MigrateController
{
    public function actionIndex()
    {
        Commands::add(
            new CommandObj(
                new \object\DBMain\migration\Migrate(),
                $_SERVER['argv']
            )
        );
    }

}