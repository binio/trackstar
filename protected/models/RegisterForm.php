<?php

class RegisterForm extends CFormModel
{
    public $username;
    public $password;
    public $password_repeat;

    public function register()
    {
        return true;
    }

    public function rules()
    {
        return array(
            array('username, password', 'required'),
            array('password_repeat', 'required'),
            array('password', 'compare', 'compareAttribute'=>'password_repeat'),
        );
    }
}