<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
        $qq = 2*2;
        //CVarDumper::dump(Yii::app()->authManager,10,true);
        //$auth = Yii::app()->authManager;
        //$role = $auth->createRole('owner');
        //$auth->createOperation('createProject','create new project');
        //$role->addChild('createProject');
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}


        public function actionMypage($p1,$p2,$hello){

        Yii::log('hello from MrT','write','');
	Yii::app()->attachBehavior('ble',array('class'=>'ext.behaviors.MrtBehavior'));
        echo Yii::app()->asa('ble')?1:0;

	CVarDumper::dump($p1,10,true);
        CVarDumper::dump($p2,10,true);
        CVarDumper::dump($hello,10,true);

        CVarDumper::dump(Yii::app()->mrtfunctions->returnSomething(),10,true);

        Yii::app()->mrtfunctions->dump($hello);
        
        Yii::app()->dump('abc234234');

         $this->render('mypage',array()); 

        }

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
        $model = new LoginForm;
        $modelRF = new RegisterForm();

        //CVarDumper::dump($_POST,10,true);
        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
            $model=new LoginForm;
            echo CActiveForm::validate($model);
			Yii::app()->end();
		}

        if(isset($_POST['ajax']) && $_POST['ajax']==='RegisterForm')
        {
            Yii::trace('here 120','000');
            $modelRF = new RegisterForm;
            echo CActiveForm::validate($modelRF);
            Yii::app()->end();
        }

        if(isset($_POST['RegisterForm']))
        {   $modelRF=new RegisterForm;
            Yii::trace('here 128','123');
            $modelRF->attributes=$_POST['RegisterForm'];
            // validate user input and redirect to the previous page if valid
            if($modelRF->validate() && $modelRF->register())
                echo '123';
                //$this->redirect(Yii::app()->user->returnUrl);
        }

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model,'registerForm'=>$modelRF));
	}

    public function actionRegister()
    {
        $modelRF = new RegisterForm();

        if(isset($_POST['ajax']) && $_POST['ajax']==='RegisterForm')
        {
            Yii::trace('here 120','000');
            $modelRF = new RegisterForm;
            echo CActiveForm::validate($modelRF);
            Yii::app()->end();
        }

        if(isset($_POST['RegisterForm']))
        {   $modelRF=new RegisterForm;
            Yii::trace('here 163','163');
            $modelRF->attributes=$_POST['RegisterForm'];
            // validate user input and redirect to the previous page if valid
            if($modelRF->validate() && $modelRF->register())
                echo 'YOUR ACCOUNT HAS BEEN CREATED';
            //$this->redirect(Yii::app()->user->returnUrl);
        }
    }

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
