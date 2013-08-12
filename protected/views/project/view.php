<?php
/* @var $this ProjectController */
/* @var $model Project */

$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Project', 'url'=>array('index')),
	array('label'=>'Create Project', 'url'=>array('create')),
	array('label'=>'Update Project', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Project', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Project', 'url'=>array('admin')),
    array('label'=>'Add user to project', 'url'=>array('adduser','pid'=>$model->id)),
);
?>

<h1>View Project #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fname',
		'sname',
        array('label'=>'link','type'=>'raw','value'=>CHtml::link(CHtml::encode('Create issue'), array('issue/create/', 'pid'=>$model->id)))
	),
));
?>

<h1>Project Issues</h1>
<?php

$this->widget('zii.widgets.CListView',array(
    'dataProvider' => $issueDataProvider,
    'itemView'=>'/issue/_view',
));