<?php
namespace sketch\sign;

use sketch\sign\model\SignWithoutModel;

class SignBase
{

    public $User;
    public $Authorize;

    public function options()
    {

        return [
            'class' => SignWithoutModel::class,
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

        echo 'SignBase\run()<br>';
        echo 'Authorize: '.$this->Authorize.'<br>';
        var_dump($this->User);

    }
}