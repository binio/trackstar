<?php
/* @var $this IntentionController */
/* @var $model Intention */

$this->breadcrumbs=array(
	'Intentions'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Intention', 'url'=>array('index')),
	array('label'=>'Create Intention', 'url'=>array('create')),
	array('label'=>'View Intention', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Intention', 'url'=>array('admin')),
);
?>

<h1>Update Intention <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>