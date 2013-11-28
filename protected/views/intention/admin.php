<script>
    $( "#line_73" ).load( "/trackstar/index.php/intention/hello","name=73" );

</script>
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
<h4>Recent Intentions</h4>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id'=>'intention-recent-grid',
    'dataProvider'=>$recentIntentions,
    //'filter'=>$model,
    'columns'=>array(
        //'id',
        'name',
        'description',
        array(
        'name' =>'created_at',
        ),
        array(
            'name'=>'id',
            'header'=>'join',
        ),
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

        array(
            'name'=>'id',
            'header'=>'UP',
            'type'=>'raw',
            'value'=>'CHtml::link("link hello", "", array("class" => "hello", "id"=>"link_$data->id","onClick"=>CHtml::ajax(array("type"=>"post","data"=>"name=$data->id", "url"=>"/trackstar/index.php/intention/hello","update"=>"#link_$data->id",))))'
            //'value' => 'CHtml::tag("div",array("id"=>"line_$data->id"))',
        ),
        array(
            'name'=>'id',
            'header'=>'Count',
            'type'=>'raw',
            //'value'=>'CHtml::link("link hello", "", array("class" => "hello", "onClick"=>CHtml::ajax(array("type"=>"post","data"=>"name=$data->id", "url"=>"/trackstar/index.php/intention/hello","update"=>"#line_$data->id",))))'
            'value' => 'CHtml::tag("div",array("id"=>"line_$data->id", "value"=>"abc"),"10")',
        ),
    ),
));
echo CHtml::textArea('ctrylist', '');
?>


<?php
//CVarDumper::dump($getPI,10,true);
//CVarDumper::dump(Yii::app()->user->id,10,true);
?>
