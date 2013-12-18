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


<h4><?php echo Yii::t('app','model.group.rmyGroups') ?></h4>
<?php

    $this->widget('bootstrap.widgets.TbGridView', array(
	//'id'=>'group-grid',
	'dataProvider'=>$dataProvider,
    //'attributes' => array('users'),
    'ajaxUpdate' => true,
	//'filter'=>$model,
	'columns'=>array(
        array('name'=>'name','header'=>Yii::t('app','model.group.name')),
        array('name'=>'description','header'=>Yii::t('app','model.group.description')),
        array('name'=>'created','header'=>Yii::t('app','model.group.created_at')),
    ),
));

?>
