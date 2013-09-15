<?php
/* @var $this IntentionController */
/* @var $model Intention */

$this->breadcrumbs=array(
	'Intentions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Intention', 'url'=>array('index')),
	array('label'=>'Create Intention', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('intention-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Intentions</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'intention-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'description',
		'created_at',
		'created_by',
        array(
            'header'=>'NUM USERS',
            'value' => 'count($data->users)',
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<h4>Participated</h4>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id'=>'participated-grid',
    'dataProvider'=> $participatedIntentions,
    'columns' => array('id','name'),
));
?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id'=>'participated-grid2',
    'dataProvider'=> $getPI,
    'ajaxUpdate'=>false,
    'columns'=>array(
        'name','id',
    ),
)); ?>

<?php
//CVarDumper::dump($getPI,10,true);
CVarDumper::dump(Yii::app()->user->id,10,true);
?>
