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
        TbHtml::button('Pomodle sie',array('color' => TbHtml::BUTTON_COLOR_SUCCESS, 'type'=>TbHtml::BUTTON_TYPE_AJAXBUTTON,  'id'=>'pray')),
        TbHtml::button('Zamknij', array('data-dismiss' => 'modal')),
    ),
)); ?>


<h4><?php echo Yii::t('app','model.intention.recent') ?></h4>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id'=>'intention-recent-grid',
    'dataProvider'=>$recentIntentions,
    //'filter'=>$model,
    'columns'=>array(
        array(
            'name'=>'name',
            'value'=>'TbHtml::link($data->name,"#",array("onClick"=>"showInt($data->id)"))',
            'type'=>'raw',
        ),
        'briefDescription',
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
		'briefDescription',
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
        'briefDescription',

        array(
            'name'=>'id',
            'header'=>'UP',
            'type'=>'raw',
            'value'=>'CHtml::link("link hello", "", array("class" => "hello", "id"=>"link_$data->id","onClick"=>CHtml::ajax(array("type"=>"post","data"=>"name=$data->id", "url"=>"http://mariajesus.net/index.php/intention/countchange","update"=>"#link_$data->id",))))'
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

    function showInt(id){
        $.ajax({
            url:"<?php echo $this->createUrl('data',array('id'=>'')) ?>"+id,
            dataType:'json',
            cache:'false',
            success:function(data){
                $("#myModal h3").html(data.name);
                $("#myModal .modal-body p").html(data.description);
                $("#pray").click(function(){pray(data.id)});
               }
        });
        jQuery('#myModal').modal({'backdrop':true,'keyboard':true,'show':true});
    }

    function pray(id){
        $.ajax({
            url:"<?php echo $this->createUrl('pray',array('id'=>'')) ?>"+id,
            dataType:'json',
            cache:'false',
            success:function(data){
                $("#pray").html('OK');
            }
        });
    }


</script>