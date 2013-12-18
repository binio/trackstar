<?php

class GroupController extends Controller
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
				'actions'=>array('create','update','admin','index'),
				'users'=>array('@'),
			),
//			array('allow', // allow admin user to perform 'admin' and 'delete' actions
//				'actions'=>array('admin','delete'),
//				'users'=>array('admin'),
//			),
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
		$model=new Group;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Group']))
		{
			$model->attributes=$_POST['Group'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->groupID));
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

		if(isset($_POST['Group']))
		{
			$model->attributes=$_POST['Group'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->groupID));
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
        $sort = new CSort();
        $sort->attributes = array('Name');
        $sort->defaultOrder = array('Name' => true);


		$dataProvider=new CActiveDataProvider('Group',
            array(
                'criteria' => array(
                    'condition' => '2=2',
                ),
                'sort' => $sort,
                'pagination' => array(
                    'pageSize' => 100,
                ),
            )
        );

//        for($i=0; $i<100; $i++)
//        {
//
//            $group = $this->buildGroup();
//
//        }


		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

    public function buildGroup(){

        $model = new Group;
        $model->name = $this->generateName();
        $model->created = $this->generateDate();
        $model->description = $this->generateDescription();
        $model->save();
    }

    public function generateName(){

         $charsStr = 'QWERTYUIOPASDFGHJKLZXCVBBNMqwertyuioopasdfghjklzxcvbnm';
         $charsArr = str_split($charsStr);

        $word = "";

        array(
            'Type'=>'Value', //Comment
        );
        for ($i=0;$i<6;$i++){
            $word .= $charsArr[rand(0,count($charsArr)-1)];
        }

        return $word;

    }

    public function generateDate(){

        $day = 60*60*24;

        $numDays = array(-3,-2,-1,0,1,2,3);

        $timestamp = time() - ($day*rand(0,6));

         return date('Y-m-d H:i:s',$timestamp);

    }

    public function generateDescription(){

        $arrDescription = array(
            "Will doon expire",
            "Expired",
            "Not done",
            "Good work",
            "Where are you",
            "This should not happen"
        );

        return $arrDescription[rand(0,5)];

    }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
//        $qb = new CDbCriteria();
//        $qb->select()
        $model = new Group('search');
        $model->unsetAttributes();

        $groupID ='';
        $userEmail='';

        $dataProvider_dao = $model->getRecentGroups('2013-05-15 00:00:00');


//        $dataProvider_dao=new CArrayDataProvider($dataDAO->queryAll(), array(
//            'id'=>'group',
//            'sort'=>array(
//                'attributes'=>array(
//                    'id', 'username', 'email','create_time','groupID'
//                ),
//            ),
//            'pagination'=>array(
//                'pageSize'=>10,
//            ),
//        ));

//echo json_encode($dataProvider_dao);Yii::app()->end();


        $sort = new CSort();
        $sort->attributes = array(
            'name' => array('asc' => 'name.DESC', 'asc' => 'name'),
            'created',
            'description',
            'users',
        );
        $sort->defaultOrder = array('name' => true);



        $dataProvider=new CActiveDataProvider('Group',
            array(
                'criteria' => array(
                    'condition' => '2=2',
                    'with'=> array( 'users' => array('joinType' => 'LEFT JOIN'),'author'),


                ),
                'sort' => $sort,
                'pagination' => array(
                    'pageSize' => 5,
                ),
            )
        );

		$model=new Group('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Group']))
			$model->attributes=$_GET['Group'];

        //CVarDumper::dump($dataProvider_dao,10,true);
		$this->render('admin',array(
			'model'=>$model,
            'dataProvider' => $dataProvider,'dataProvider_dao'=>$dataProvider_dao
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Group::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='group-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function init()
    {
            parent::init();
            Yii::app()->language = Yii::app()->params['languages']['pl'];
    }
}
