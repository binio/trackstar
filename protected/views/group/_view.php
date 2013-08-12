<?php
/* @var $this GroupController */
/* @var $data Group */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('groupID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->groupID), array('view', 'id'=>$data->groupID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />


</div>