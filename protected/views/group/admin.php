<?php
/* @var $this GroupController */
/* @var $model Group */

$this->breadcrumbs=array(
	'Groups'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Group', 'url'=>array('index')),
	array('label'=>'Create Group', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('group-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app','model.group.groups'); ?></h1>

<h4><?php echo Yii::t('app','model.group.recent') ?></h4>
<?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'dataProvider'=>$dataProvider_dao,
        'columns' =>array(
            'name',
            'creator',
            'briefDescription',
            'created',
        ),

    ));
?>

<?php

    function sayHello($data){
        $emails = '';
        foreach($data as $user){
            $emails.= ', '.$user->email;
        }
        return $emails;
    }
    $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'group-grid',
	'dataProvider'=>$dataProvider,
    //'attributes' => array('users'),
    'ajaxUpdate' => true,
	//'filter'=>$model,
	'columns'=>array(
		'groupID',
		'name',
		'description',
		'created',
        array(
            'header'=>'User email',
            'name'=>'users.email',
            'value' => '($data->users == null ? CHtml::encode("NA") : CHtml::encode($data->author->email,3,true))',
        ),
        array(
            'header'=>'Author',
            'value' => 'CHtml::encode($data->author->email)',
        ),
        array(
            'header'=>'DUMP USERS',
            'value' => 'sayHello($data->users)',
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
