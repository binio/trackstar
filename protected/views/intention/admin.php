<?php
/* @var $this IntentionController */
/* @var $model Intention */

$this->breadcrumbs=array(
	'Intentions'=>array('index'),
	'Manage',
);

$this->menu=array(
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

<h4>My Intentions</h4>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'intention-grid',
	'dataProvider'=>$dataProvider,
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		'name',
		'description',
		'created_at',
		//'created_by',
//        array(
//            'header'=>'NUM USERS',
//            'value' => 'count($data->users)',
//        ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>

<?php
//$this->widget('bootstrap.widgets.TbGridView', array(
//    'id'=>'participated-grid',
//    'dataProvider'=> $participatedIntentions,
//    'columns' => array('id','name'),
//));
?>

<h4>I joined intentions</h4>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id'=>'participated-grid2',
    'dataProvider'=> $getPI,
    'ajaxUpdate'=>true,
    'columns'=>array(
        'name',
        'description',
        array
        (
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{rate}',
            'buttons'=>array(
                'rate'=>array(
                    'options'=>array('class'=>'icon-leaf', 'title'=>'Up', 'rel'=>'tooltip', 'onclick'=>'alert("abc");'),
                    'label'=>'',
                    'imageUrl'=>'',
                    //'click'=>'alert("hello thomas")',
                    'url'=>function ($data, $row) {
                        return 'http://google.com';
                    },
                ),
            ),
        ),
    ),
)); ?>

<?php
//CVarDumper::dump($getPI,10,true);
//CVarDumper::dump(Yii::app()->user->id,10,true);
?>
