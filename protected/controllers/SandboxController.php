<?php

class SandboxController extends Controller {

    public function actionHello()
    {
       //CVarDumper::dump('hello',10, true);
        $out = array();
        for($i=0;$i<100;$i++)
        {
            $b =$i.'bb';//array('name'=>'thomas', 'age'=>rand(1,85), 'string'=>$i.'abc'.rand(1000,9000));

            $out[] = $b;
        }
        $criteria = new CDbCriteria();
        $criteria->select = '*';
        $users  = User::model()->findAll($criteria);

        $users2 = Yii::app()->db->createCommand()
            ->select('username')
            ->from('user')
            ->query();

        $arr = array();

        foreach ($users as $model)
        {
            $arr[] = array(
                'id'=>$model['id'],
                'value'=>$model['username'],
            );
        }

        echo CJSON::encode($arr);
        //Yii::app()->end();
    }
}