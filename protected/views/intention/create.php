<?php
/* @var $this IntentionController */
/* @var $model Intention */

$this->breadcrumbs=array(
	'Intentions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Intention', 'url'=>array('index')),
	array('label'=>'Manage Intention', 'url'=>array('admin')),
);
?>

<h1>Create Intention</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>