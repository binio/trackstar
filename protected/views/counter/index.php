<?php
echo 'abc';

$this->widget('bootstrap.widgets.TbGridView', array(
    'id'=>'participated-grid2',
    'dataProvider'=> $model,
    'ajaxUpdate'=>true,
    'columns'=>array(
        'intention_id',
        array(
            'header'=>'USER ID',
            'value'=>'$data->user_id'),
    )));