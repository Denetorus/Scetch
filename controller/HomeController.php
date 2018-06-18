<?php

namespace controller;

use sketch\controller\ControllerBase;

class HomeController extends ControllerBase
{

    public function actionIndex()
    {

        return  $this->render("home/index.php");

    }

}