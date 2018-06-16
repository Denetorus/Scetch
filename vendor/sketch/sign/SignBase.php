<?php
namespace sketch\sign;

use controller\HomeController;
use sketch\sign\model\SignWithoutModel;

class SignBase
{

    public $User;
    public $Authorize;

    public function options()
    {

        return [
            'class' => new SignWithoutModel,
        ];

    }

    public function getSignParams(){
        return [
            'User' => $this->User,
            'Authorize' => $this->Authorize
        ];
    }


    public function run(){

        $SignOptions = $this->options();

        $SM = new $SignOptions['class'];
        unset($SignOptions['class']);
        foreach ($SignOptions as $key => $value) {
            $SM->{$key} = $value;
        }

        $this->User = $SM->SignIn();
        $this->Authorize = ($this->User['id'] !== 0);

        return $this->getSignParams();


    }
}