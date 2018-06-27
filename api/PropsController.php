<?php

namespace api;

use sketch\SK;
use sketch\controller\ControllerBase;


class PropsController extends ControllerBase
{
    public function actionIndex($id)
    {
        return  json_encode(SK::getProps());
    }
}
