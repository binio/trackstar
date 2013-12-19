<?php

/**
 * This is the model class for table "Group".
 *
 * The followings are the available columns in table 'Group':
 * @property integer $groupID
 * @property string $name
 * @property string $description
 * @property string $created
 */
class Group extends CActiveRecord
{
    //public $users = array();
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Group the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

//    public function getUsers()
//    {
//      return $this->users[0];
//    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Groups';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description', 'length', 'max'=>45),
			array('created', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('groupID, name, description, created', 'safe', 'on'=>'search'),
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
            'users'=>array(self::MANY_MANY,'User','groups_users(group_id,user_id)'),
            'author'=>array(self::BELONGS_TO,'User','user_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'groupID' => 'Group',
			'name' => Yii::t('app','model.group.name'),
			'briefDescription' => Yii::t('app','model.group.description'),
			'created' => Yii::t('app','model.group.created_at'),
            'creator' => Yii::t('app','model.group.userName'),
		);
	}

    public function getRecentGroups($recent){

        $sort = new CSort();
        $criteria = new CDbCriteria();
        $criteria->condition = 'created>:created_at AND user_id !=:user_id';
        $criteria->params = array(':created_at'=>$recent, ':user_id'=>Yii::app()->user->id);
        $criteria->order = 'created DESC';

        return new CActiveDataProvider('Group',
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
     * Gets Groups current user participates in
     */
    public function getUserGroup()
    {
        $dataDAO =  Yii::app()->db->createCommand('SELECT * FROM Groups g left join groups_users gs on (g.groupID=gs.group_id)
        WHERE gs.user_id='.Yii::app()->user->id);

        return $dataProvider_dao = new CArrayDataProvider($dataDAO->queryAll(), array(
                        'keyField'=>'groupID', //nasty trick when key database field is not named 'id'
                        'id'=>'groupID',
                        'sort'=>array(
                                'attributes'=>array(
                                        'groupID', 'name', 'created'
                                    ),
                            ),
                        'pagination'=>array(
                                'pageSize'=>10,
                            ),
                    ));


    }

    public function getCreator()
    {
        $model = User::model()->findByPk($this->user_id);
        return $model->username;
    }

    /*
     * Gets description limited to number of characters
     */
    public function getBriefDescription()
    {
        return substr($this->description,0,40).'...';
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

		$criteria->compare('groupID',$this->groupID);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('created',$this->created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /*
     * Automates timestamp for records
     */
    public function beforeSave() {
        if ($this->isNewRecord){
            $this->created = new CDbExpression('NOW()');
        }

        return parent::beforeSave();
    }
}