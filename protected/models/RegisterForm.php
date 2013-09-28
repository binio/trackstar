<?php

class RegisterForm extends CFormModel
{
    public $username;
    public $password;
    public $password_repeat;
    public $email;

    public function register()
    {
        $model = new User();
        $model->username = $this->username;
        $model->password = $this->password;
        $model->password_repeat = $this->password_repeat;
        $model->email = $this->email;

        return $model->save();
    }

    public function rules()
    {
        return array(
            array('username, password, email', 'required'),//add unique validator and try to insert to db
            array('password_repeat', 'required'),
            array('password', 'compare', 'compareAttribute'=>'password_repeat'),
            array('username','unique', 'className' => 'User'),
            array('email','unique','className' => 'User'),
            array('email', 'length', 'max'=>256),
        );
    }
}