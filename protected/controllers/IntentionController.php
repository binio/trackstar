<?php

class IntentionController extends Controller
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

			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','admin','countChange','data'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Intention;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Intention']))
		{
			$model->attributes=$_POST['Intention'];
            $model->created_by = Yii::app()->user->id;
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Intention']))
		{
			$model->attributes=$_POST['Intention'];
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
		$dataProvider=new CActiveDataProvider('Intention');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

    public function actionCountChange()
    {
        $intention_id = $_POST['name'];
        $user_id = Yii::app()->user->id;

        $counter = Counter::model()->find('user_id=:userId AND intention_id=:intentionId',array(':userId'=>$user_id,':intentionId'=>$intention_id));

        if($counter == null){
            $counter = new Counter();
            $counter->setAttribute('activity_count',1);
            $counter->setAttribute('user_id',$user_id);
            $counter->setAttribute('intention_id',$intention_id);
        }else{
            $count = $counter->getAttribute('activity_count');
            $counter->setAttribute('activity_count',$count +1);
        }

        $counter->save();
        echo $counter->activity_count;
    }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Intention('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Intention']))
			$model->attributes=$_GET['Intention'];

        $dataProvider = $model->getAuthorIntentions(Yii::app()->user->id);
        $recentIntentions = $model->getRecentIntention('2013-08-15 00:00:00');

        $participatedIntentions = new CArrayDataProvider(
            $model->getParticipatedIntentions(Yii::app()->user->id,
            array(
                'id'=>'participated',
                'pagination' => array(
                    'pageSize' => 3,
                )

            )
            )
        );

        $getPI = $model->getPI(Yii::app()->user->id);
        //CVarDumper::dump($getPI,10,true);
		$this->render('admin',array(
			'model'=>$model,
            'dataProvider' => $dataProvider,
            'participatedIntentions'=> $participatedIntentions,
            'recentIntentions'=> $recentIntentions,
            'getPI'=>$getPI,
		));
	}

    public function actionData($id)
    {
        $criteria = new CDbCriteria();
        //$criteria->select(array('name','description'));
        $criteria->condition = 'id=:intentionID';
        $criteria->params = array(':intentionID'=>$id);
        $criteria->select = array('name','description');
        $intention = Intention::model()->find($criteria);

        echo CJSON::encode($intention);
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Intention::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='intention-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}



    function init()
    {
        parent::init();
        Yii::app()->language = 'pl';//Yii::app()->params['languages']['en_us'];
    }
}
