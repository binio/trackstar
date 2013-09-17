<div class="form span5" style="background: #cccccc; -webkit-border-radius: 30px; padding: 15px">
    <h3>Register</h3>
    <p>Please fill out the following form with your login credentials: Fields with <span class="required">*</span> are required.</p>
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