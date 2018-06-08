<?php
namespace sketch\sign\model;

use sketch\sign\SignModelInterface;

class SignWithoutModel implements SignModelInterface
{
    public function SignIn(){
        return [
            'id' => 0,
            'username' => 'guest',
        ];
    }

    public function Register(){
        return true;
    }

}