<div class="form span5">
    <h3>Register</h3>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'RegisterForm',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->label($model,'username'); ?>
        <?php echo $form->textField($model,'username') ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'password'); ?>
        <?php echo $form->passwordField($model,'password') ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'password repeat'); ?>
        <?php echo $form->passwordField($model,'password_repeat') ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('Register'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->