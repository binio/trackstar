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

    public function attributeLabels() {
        return array(
            'username'=>Yii::t('app','model.register.username'),
            'email'=>Yii::t('app','model.register.email'),
            'password'=>Yii::t('app','model.register.password'),
            'password_repeat'=>Yii::t('app','model.register.password_repeat'),
        );
    }
    public function rules()
    {
        return array(
            array('username, password, email, password_repeat', 'required'),//add unique validator and try to insert to db
            array('password_repeat', 'compare', 'compareAttribute'=>'password'),
            array('username','unique', 'className' => 'User'),
            array('email','unique','className' => 'User'),
            array('email', 'length', 'max'=>256),
        );
    }
}