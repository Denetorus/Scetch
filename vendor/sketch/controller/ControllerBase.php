<?php

namespace sketch\controller;

class ControllerBase
{
    public function render($fileName, $params = [])
    {

        $fileName = VIEW.'/'.$fileName;

        if (is_file($fileName)){

            include $fileName;
            return "";

        } else {
            return "This site made with use SKETCH framework ";
        }

    }
}
