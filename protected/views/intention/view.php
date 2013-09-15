<?php
/* @var $this IntentionController */
/* @var $model Intention */

$this->breadcrumbs=array(
	'Intentions'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Intention', 'url'=>array('index')),
	array('label'=>'Create Intention', 'url'=>array('create')),
	array('label'=>'Update Intention', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Intention', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Intention', 'url'=>array('admin')),
);
?>

<h1>View Intention #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'created_at',
		'created_by',
	),
)); ?>
