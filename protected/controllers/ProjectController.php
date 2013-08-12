<?php

class ProjectController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','view', 'adduser', 'create', 'update'),
                'users'=>array('@'),
            ),
//            array('allow', // allow authenticated user to perform 'create' and 'update' actions
//                'actions'=>array('create','update'),
//                'users'=>array('@'),
//            ),
//            array('allow', // allow admin user to perform 'admin' and 'delete' actions
//                'actions'=>array('admin','delete'),
//                'users'=>array('admin'),
//            ),
//            array('deny',  // deny all users
//                'users'=>array('*'),
//            ),
        );
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $issueDataProvider = new CActiveDataProvider('Issue',array(
            'criteria'=>array(
                'condition'=>'project_id=:projectId',
                'params'=>array( ':projectId'=>$id),
            ),
            'pagination'=>array(
                'pageSize'=>2
            ),

        ));
		$this->render('view',array(
			'model'=>$this->loadModel($id),
            'issueDataProvider'=>$issueDataProvider,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Project;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Project']))
		{
			$model->attributes=$_POST['Project'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
        //CVarDumper::dump(Yii::app()->authManager->getAuthItems(2,7),10,true);die();
		$model=$this->loadModel($id);
        //$model->associateUserToRole('owner', Yii::app()->user->getId());

        //CVarDumper::dump($model->isUserInRole('owner'),10,true);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        //$auth = Yii::app()->authManager;
        //$bizRule = 'return isset($params["project"]) && $params["project"]->isUserRole("owner")';
        //$auth->assign('owner',7,$bizRule);



        if(!Yii::app()->user->checkAccess('updateProject', array('project'=>$model))){

            throw new CHttpException(403,'You not authorized');
        }

		if(isset($_POST['Project']))
		{
			$model->attributes=$_POST['Project'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        //CVarDumper::dump(Yii::app()->user,10,true);die;
		$dataProvider=new CActiveDataProvider('Project');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Project('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Project']))
			$model->attributes=$_GET['Project'];
        CVarDumper::dump($model->attributes,10,true);
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Project::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='project-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionAdduser($pid)
    {
        $form = new ProjectUserForm();
        $project = $this->loadModel($pid);
        //CVarDumper::dump($project,2,true);

        if(isset($_POST['ProjectUserForm']))
        {
            //CVarDumper::dump($_POST['ProjectUserForm']);die();
            $form->attributes=$_POST['ProjectUserForm'];
            $form->project = $project;

            if($form->validate())
            {
                //CVarDumper::dump($_POST['ProjectUserForm']);die();
                Yii::app()->user->setFlash('success',$form->username . " has been added to project");
                $user = User::model()->findByAttributes(array('username'=>$_POST['ProjectUserForm']['username']));
                $project->associateUserToProject($user);
                $project->associateUserToRole($_POST['ProjectUserForm']['role'], $user->id);

                $auth = Yii::app()->authManager;
                $auth->assign($_POST['ProjectUserForm']['role'], $user->id,'');

                $form=new ProjectUserForm;

            }
        }

        //display form
        $users = User::model()->findAll();
        $userNames = array();

        foreach($users as $user)
        {
            $usernames[] = $user->username;
        }
        //CVarDumper::dump($usernames,10,true);
        $form->project = $project;
        $this->render('adduser',array('model'=>$form, 'username'=>$usernames));

    }
}
