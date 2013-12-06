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
	array('label'=>Yii::t('app','model.intention.add'), 'url'=>array('create')),
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


<?php $this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'myModal',
    'header' => 'Modal Heading',
    'content' => '<p>One fine body...</p>',
    'remote' => 'http://www.wp.pl',
    //'options' => '',
    'footer' => array(
        TbHtml::button('Save Changes', array('data-dismiss' => 'modal', 'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::button('Close', array('data-dismiss' => 'modal')),
    ),
)); ?>

<?php echo TbHtml::button('Click me to open modal', array(
    'style' => TbHtml::BUTTON_COLOR_PRIMARY,
    'size' => TbHtml::BUTTON_SIZE_LARGE,
    'data-toggle' => 'modal',
    'data-target' => '#myModal',
)); ?>

<h4><?php echo Yii::t('app','model.intention.recent') ?></h4>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id'=>'intention-recent-grid',
    'dataProvider'=>$recentIntentions,
    //'filter'=>$model,
    'columns'=>array(
        array(
            'name'=>'name',
            'value'=>'TbHtml::link($data->name,"#",array("onClick"=>"showInt()"))',
            'type'=>'raw',
        ),
        'name',
        'description',
        array(
        'name' =>'created_at',
        ),
//        array(
//            'name'=>'id',
//            'header'=>'join',
//        ),
        //'created_by',
//        array(
//            'header'=>'NUM USERS',
//            'value' => 'count($data->users)',
//        ),
//        array(
//            'class'=>'bootstrap.widgets.TbButtonColumn',
//        ),
    ),
)); ?>

<h4><?php echo Yii::t('app','model.intention.my') ?></h4>


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

<h4><?php echo Yii::t('app','model.intention.ipray') ?></h4>
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
            'value'=>'CHtml::link("link hello", "", array("class" => "hello", "id"=>"link_$data->id","onClick"=>CHtml::ajax(array("type"=>"post","data"=>"name=$data->id", "url"=>"/trackstar/index.php/intention/countchange","update"=>"#link_$data->id",))))'
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
<script>
    $(document).ready(function(){
        jQuery('#myModal').modal({'backdrop':true,'keyboard':true,'show':false});
    });
        console.log('hello');

    function showInt(){
        jQuery('#myModal').modal({'backdrop':true,'keyboard':true,'show':true});
    }


</script>