<?php Yii::app()->clientScript->registerCoreScript('jquery.ui');?>

<div class="form span5" style="background: #cccccc; -webkit-border-radius: 30px; padding: 15px">
    <h3><?php echo Yii::t('app','model.register.register') ?></h3>
    <div id="contentRegister">
    <p>Please fill out the following form with your login credentials: Fields with <span class="required">*</span> are required.</p>
    </div>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'RegisterForm',
        'enableClientValidation'=>false,
        'enableAjaxValidation'=>true,
        'htmlOptions'=>array(
            'onsubmit'=>"return false;",/* Disable normal form submit */
            //'onkeypress'=>" if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
        ),
        'clientOptions'=>array(
        //'validateOnSubmit'=>true,
        //'afterValidate'=>'js:send()',
    ))); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'username'); ?>
        <?php echo $form->textField($model,'username') ?>
        <?php echo $form->error($model,'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email') ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'password'); ?>
        <?php echo $form->passwordField($model,'password') ?>
        <?php echo $form->error($model,'password'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'password_repeat'); ?>
        <?php echo $form->passwordField($model,'password_repeat') ?>
        <?php echo $form->error($model,'password_repeat'); ?>
    </div>


    <div class="row submit">
        <?php echo CHtml::submitButton('Register', array('onclick'=>'send()')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->

<script type="text/javascript">

    function send()
    {

        var data=$("#RegisterForm").serialize();


        $.ajax({
            type: 'POST',
            url: '<?php echo Yii::app()->createAbsoluteUrl("site/register"); ?>',
            data:data,
            success:function(data){
                if(data=='YOUR ACCOUNT HAS BEEN CREATED'){
                    $('#RegisterForm').effect('fade');
                    $('#contentRegister').append(data);
                }
            },
            error: function(data) { // if error occured
                alert("Error occured.please try again");
                alert(data);
            },

            dataType:'html'
        });

    }

</script>