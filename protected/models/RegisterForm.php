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
            array('username, password', 'required'),//add unique validator and try to insert to db
            array('password_repeat', 'required'),
            array('password', 'compare', 'compareAttribute'=>'password_repeat'),
            array('username','unique', 'className' => 'User'),
        );
    }
}