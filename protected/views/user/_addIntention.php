<div id='addInt' style="background: #faf2cc; -webkit-border-radius: 30px; padding: 15px">
<?php echo TbHtml::lead('Create New 123'); ?>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'layout' => TbHtml::FORM_LAYOUT_VERTICAL,
    'enableAjaxValidation' => true,
    'action' => 'user/my')); ?>

<?php echo $form->textFieldControlGroup($model, 'name',
    array('help' => 'In addition to freeform text, any HTML5 text-based input appears like so.'));
//    bootstrap.widgets.TbActiveForm;
?>

<?php echo $form->textAreaControlGroup($model, 'description',
    array('span' => 4, 'rows' => 5), array( 'label' => 'My Description')); ?>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>

<?php $this->endWidget(); ?>

</div>
<script>$('#addInt').append('123')</script>