<?php

/**
 * This is the model class for table "Counter".
 *
 * The followings are the available columns in table 'Counter':
 * @property integer $user_id
 * @property integer $intention_id
 * @property integer $activity_count
 */
class Counter extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Counter the static model class
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
        return 'Counter';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, intention_id', 'required'),
            array('user_id, intention_id, activity_count', 'numerical', 'integerOnly'=>true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('user_id, intention_id, activity_count', 'safe', 'on'=>'search'),
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
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'user_id' => 'User',
            'intention_id' => 'Intention',
            'activity_count' => 'Activity Count',
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

        $criteria->compare('user_id',$this->user_id);
        $criteria->compare('intention_id',$this->intention_id);
        $criteria->compare('activity_count',$this->activity_count);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public function updateCounter($user_id, $intention_id, $counter)
    {
        $connection = Yii::app()->db;
        $sqlUpdate = "UPDATE Counter SET activity_count = $counter WHERE user_id=:user_id AND intention_id=:intention_id";
        $command=$connection->createCommand($sqlUpdate);
        $command->bindParam(":user_id",$user_id,PDO::PARAM_INT);
        $command->bindParam(":intention_id",$intention_id,PDO::PARAM_INT);
        $command->execute();
    }

    public function getCounter($user_id, $intention_id)
    {
        $connection = Yii::app()->db;
        $sql = "SELECT activity_count FROM Counter WHERE user_id=:user_id AND intention_id=:intention_id";
        $command=$connection->createCommand($sql);
        $command->bindParam(":user_id",$user_id,PDO::PARAM_INT);
        $command->bindParam(":intention_id",$intention_id,PDO::PARAM_INT);
        $dataReader = $command->query();
        $arr = $dataReader->read();

        $counter =  $arr['activity_count'];
        $counter = $counter+1;

        return $counter;
    }
}