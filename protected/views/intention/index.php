<?php
/* @var $this IntentionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Intentions',
);

$this->menu=array(
	array('label'=>'Create Intention', 'url'=>array('create')),
	array('label'=>'Manage Intention', 'url'=>array('admin')),
);
?>

<h1>Intentions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
