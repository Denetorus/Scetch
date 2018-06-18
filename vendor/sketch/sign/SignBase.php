<?php

namespace sketch\sign;

use sketch\CommandInterface;
use sketch\sign\model\SignWithoutModel;

abstract class SignBase implements CommandInterface
{

    public $User;
    public $Authorize;

    public function options()
    {
        return [
            'class' => new SignWithoutModel,
        ];
    }

    public function getSignParams()
    {
        return [
            'User' => $this->User,
            'Authorize' => $this->Authorize
        ];
    }


    public function run($params=[])
    {
        $SignOptions = $this->options();

        $SM = new $SignOptions['class'];
        unset($SignOptions['class']);
        foreach ($SignOptions as $key => $value) {
            $SM->{$key} = $value;
        }

        $this->User = $SM->signIn();
        $this->Authorize = ($this->User['id'] !== 0);

        return $params['router']->run($this->getSignParams());
    }
}