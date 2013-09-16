<?php

class RegisterForm extends CFormModel
{
    public $username;
    public $password;
    public $password_repeat;

    public function register()
    {

    }

    public function rules()
    {
        return array(
            array('username, password', 'required'),
            array('password_repeat', 'required', 'on'=>'register'),
            array('password', 'compare', 'compareAttribute'=>'password_repeat', 'on'=>'register'),
        );
    }
}