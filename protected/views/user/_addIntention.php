<div id='addInt' style="background: #faf2cc; -webkit-border-radius: 30px; padding: 15px">
<?php echo TbHtml::lead('Create New 123'); ?>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'intention-form',
    'layout' => TbHtml::FORM_LAYOUT_VERTICAL,
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'onsubmit'=>"return false;",/* Disable normal form submit */
        //'onkeypress'=>" if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
    ),
//    'clientOptions'=>array(
//        'validateOnSubmit'=>true,
//        'afterValidate'=>'js:send()',
//        'validateOnChange'=>false,
//        'validateOnType'=>false,
//    ),
//    'enableClientValidation'=>true,
//    'action' => ''
    )); ?>

<?php echo $form->textFieldControlGroup($model, 'name',
    array('help' => 'In addition to freeform text, any HTML5 text-based input appears like so.'));
//    bootstrap.widgets.TbActiveForm;
?>

<?php echo $form->textAreaControlGroup($model, 'description',
    array('span' => 4, 'rows' => 5), array( 'label' => 'My Description')); ?>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY, 'onclick'=>'send();')),
    TbHtml::resetButton('Reset'),
)); ?>

<?php $this->endWidget(); ?>

</div>
<script>$('#addInt').append('123')</script>
<script type="text/javascript">

    function send()
    {

        var data=$("#intention-form").serialize();


        $.ajax({
            type: 'POST',
            url: '<?php echo Yii::app()->createAbsoluteUrl("user/my"); ?>',
            data:data,
            success:function(data){
                $('#addInt').append(data);
            },
            error: function(data) { // if error occured
                alert("Error occured.please try again");
                alert(data);
            },

            dataType:'html'
        });

    }

</script>