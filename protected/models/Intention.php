<?php

/**
 * This is the model class for table "Intention".
 *
 * The followings are the available columns in table 'Intention':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $created_at
 * @property integer $created_by
 *
 * The followings are the available model relations:
 * @property User $id0
 */
class Intention extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Intention the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Intention';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_by', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('description, created_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, created_at, created_by', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'author' => array(self::BELONGS_TO, 'User', 'id'),
            'users' => array(self::MANY_MANY,'User','user_intention(user_id,intention_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => Yii::t('app','model.intention.name'),
			'description' => Yii::t('app','model.intention.description'),
			'created_at' => Yii::t('app','model.intention.created_at'),
			'created_by' => 'Created By',
            'briefDescription'=>Yii::t('app','model.intention.description'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('created_by',$this->created_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getAuthorIntentions($userId)
    {
       $sort = new CSort();
       return  new CActiveDataProvider('Intention',
            array(
                'criteria' => array(
                    'condition' => "created_by = $userId",
                    'with'=> array( 'users' => array('joinType' => 'LEFT JOIN'),'author'),


                ),
                'sort' => $sort,
                'pagination' => array(
                    'pageSize' => 5,
                ),
            )
        );
    }

    public function getParticipatedIntentions($userId)
    {
        $connection = Yii::app()->db;
        $sql = "SELECT * FROM Intention i JOIN user_intention ui ON(i.id = ui.intention_id)  WHERE ui.user_id=:user_id";
        $command = $connection->createCommand($sql);
        $command->bindParam(":user_id",$userId,PDO::PARAM_INT);

        return $command->queryAll();
    }

    public function getRecentIntention($recent)
    {
        $sort = new CSort();
        $criteria = new CDbCriteria();
        $criteria->condition = 'created_at>:created_at AND created_by !=:user_id';
        $criteria->params = array(':created_at'=>$recent, ':user_id'=>Yii::app()->user->id);
        $criteria->order = 'created_at DESC';

        return new CActiveDataProvider('Intention',
            array(
                'criteria'=>$criteria,
                'sort' => $sort,

                'pagination' => array(
                    'pageSize' => 10,
                ),
            )
        );
    }

    /*
     * relative AR without related models
     */
    public function getPI($userId)
    {
        $sort = new CSort();
        return new CActiveDataProvider('Intention',
            array(
                'criteria' => array(
                    'with'=> array(
                        'users' => array(
                            'joinType' => 'INNER JOIN',
                            'select'=>false,
                            'condition'=>'user_id='.$userId.' AND 9=9'
                        )
                    ),
                    'together'=>true,

                ),
                'sort' => $sort,
                'pagination' => array(
                    'pageSize' => 3,
                ),
            )
        );




//        return $records = Intention::model()->with(
//            array('users'=>array(
//                'select'=>false,
//                'joinType'=>'INNER JOIN',
//                'condition'=>'users.id='.$userId,
//            ),
//
//            ))->findAll();
    }

    /*
     * Gets description limited to number of characters
     */
    public function getBriefDescription()
    {
        return substr($this->description,0,40).'...';
    }

    /*
     * Automates timestamp for records
     */
    public function beforeSave() {
        if ($this->isNewRecord){
            $this->created_at = new CDbExpression('NOW()');
        }

        return parent::beforeSave();
    }
}