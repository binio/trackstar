
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.10.3.custom/css/ui-lightness/jquery-ui-1.10.3.custom.css" media="screen, projection" />
<?php
//Yii::app()->clientScript->registerCoreScript('jquery');
//Yii::app()->clientScript->registerScript('jquery-ui','http://code.jquery.com/ui/1.10.3/jquery-ui.js',CClientScript::POS_HEAD);

Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-ui-1.10.3.custom/js/jquery-1.9.1.js',CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js',CClientScript::POS_HEAD);
?>

<?php
//Yii::app()->clientScript->registerScript('modalscript',Yii::app()->request->baseUrl.'/js/modalscript.js',CClientScript::POS_READY);
?>

<Script>

    $(function() {
        $( "#dialog-modal" ).dialog({
            height: 140,
            modal: true,
            show:{
              effect: "blind",
              duration: 1000
            },
            hide:{
                effect: "blind",
                duration: 1000
            }
        });
    });
</Script>
<?php
/* @var $this ProjectController */
/* @var $dataProvider CActiveDataProvider */


$this->breadcrumbs=array(
	'Projects',
);

$this->menu=array(
	array('label'=>'Create Project', 'url'=>array('create')),
	array('label'=>'Manage Project', 'url'=>array('admin')),
);
?>

<h1>Projects</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<div id="dialog-modal" title="Basic modal dialog">
    <p>Adding the modal overlay screen makes the dialog look more prominent because it dims out the page content.</p>
</div>
