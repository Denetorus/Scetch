<?php

namespace sketch;

use sketch\Command;

class commands implements CommandInterface
{

    public function run($params=[]){
        foreach ($params as $param){
            $obj = new $param['command'];
            $obj->run($param['params']);
        }
    }

}