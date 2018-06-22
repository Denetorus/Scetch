<?php

namespace sketch\view;

class ViewBase
{
    private function setParams($file){

    }

    public function render($fileName, $params = [])
    {
        include $fileName;
        return "";
    }
}