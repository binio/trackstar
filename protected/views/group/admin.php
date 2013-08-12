<?php
/* @var $this GroupController */
/* @var $model Group */

$this->breadcrumbs=array(
	'Groups'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Group', 'url'=>array('index')),
	array('label'=>'Create Group', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('group-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Groups</h1>

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


<?php $this->widget('bootstrap.widgets.TbNav', array(
    'type' => TbHtml::NAV_TYPE_TABS,
    'items' => array(
        array('label' => 'Home', 'url' => '#', 'active' => true),
        array('label' => 'Profile', 'url' => '#',),
        array('label' => 'Messages', 'url' => '#',),
    ),
)); ?>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id'=>'group-grid_dao',
    'dataProvider'=>$dataProvider_dao,
    'columns' =>array(
        'email',
        array('name' => 'id','header' => 'Group&nbsp;&nbsp;&nbsp;'),
        array('name' =>'username', 'header' => 'User'),
        array('name'=>'create_time','header'=>'Group created',),
        'name','description',
        'groupID'
    ),

)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'group-grid',
	'dataProvider'=>$dataProvider,
    //'attributes' => array('users'),
    'ajaxUpdate' => true,
	//'filter'=>$model,
	'columns'=>array(
		'groupID',
		'name',
		'description',
		'created',
        array(
            'header'=>'User email',
            'name'=>'users.email',
            'value' => '($data->users == null ? CHtml::encode("NA") : CHtml::encode($data->users[0]->email,3,true))',
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
