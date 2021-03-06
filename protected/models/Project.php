<?php

/**
 * This is the model class for table "project".
 *
 * The followings are the available columns in table 'project':
 * @property integer $id
 * @property string $fname
 * @property string $sname
 */
class Project extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Project the static model class
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
		return 'project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('fname, sname', 'length', 'max'=>45),
            array('fname, sname','required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fname, sname', 'safe', 'on'=>'search'),
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
            'issues'=> array(self::HAS_MANY,'Issue','project_id'),
            'users'=> array(self::MANY_MANY, 'User','project_user_assignment(project_id, user_id)')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fname' => 'Fname',
			'sname' => 'Sname',
            'name'=>'Project Name',
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
		$criteria->compare('fname',$this->fname,true);
		$criteria->compare('sname',$this->sname,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getUsersOptions()
    {
        return CHtml::listData($this->users,'id','username');
    }

    public function associateUserToRole($role, $userId)
    {
        $sql = "INSERT INTO project_user_role (project_id,user_id, role) VALUES (:projectId, :userId, :role)";

        $command = Yii::app()->db->createCommand($sql);
        $command->bindValue(":projectId", $this->id, PDO::PARAM_INT);
        $command->bindValue(":userId", $userId, PDO::PARAM_INT);
        $command->bindValue(":role", $role, PDO::PARAM_STR);

        return $command->execute();
    }

    public function isUserInRole($role)
    {
        $sql = "SELECT role FROM project_user_role WHERE project_id=:projectId AND user_id=:userId AND role=:role";

        $command = Yii::app()->db->createCommand($sql);
        $command->bindValue(":projectId", $this->id, PDO::PARAM_INT);
        $command->bindValue(":userId", Yii::app()->user->getId(), PDO::PARAM_INT);
        $command->bindValue(":role", $role, PDO::PARAM_STR);

        return $command->execute() == 1 ? true : false;
    }

//    public function executeBizRule(string $bizRule, array $params, mixed $data)
//    {
//        return true;
//    }
    public static function getUserRoleOptions()
    {
        return CHtml::listData(Yii::app()->authManager->getRoles(),'name','name');
    }

    public function associateUserToProject($user)
    {
        $sql =  "INSERT INTO project_user_assignment (project_id, user_id) VALUES (:projectId, :userId)";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindValue(":projectId",$this->id, PDO::PARAM_INT);
        $command->bindValue(":userId",$user->id, PDO::PARAM_INT);

        return $command->execute();
    }

    public function isUserInProject($user)
    {
        $sql = "SELECT user_id FROM project_user_assignment WHERE project_id:=projectId AND user_id:=userId";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindValue(":projectId",$this->id, PDO::PARAM_INT);
        $command->bindValue(":user_id",$user->id, PDO::PARAM_INT);

        return $command->execute() == 1 ? true : false;

    }
}