<?php
/**
 * Created by JetBrains PhpStorm.
 * User: root
 * Date: 28/06/13
 * Time: 11:08
 * To change this template use File | Settings | File Templates.
 */

?>


<?php if(Yii::app()->user->hasFlash('success')) : ?>
    <div class"successMessage">ALL OK</div>
<?php endif; ?>

<?php $form = $this->beginWidget('CActiveForm'); ?>

<?php
//CVarDumper::dump($model,10,true);
echo $form->labelEx($model,'username'); ?>
<?php

$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
//    'model'=>'User',
//    'attribute'=>'username',
//    'multiple'=>false,
//      'dataType'=>'jsonp',
      'name'=>'username',
      'id'=>'username',
      'source'=>$this->createUrl('Sandbox/hello'),
//      'source'=>array(
//          array('username'=>'binio', 'age'=>'22'),
//          array('username'=>'binio22', 'age'=>'20'),
//          array('username'=>'binio33', 'age'=>'27'),
//          array('username'=>'binio44', 'age'=>'26'),
//          array('username'=>'binio46', 'age'=>'21'),
//          array('username'=>'binio55', 'age'=>'24'),
//      ),
      'options'=>array(
          //'dataType'=>'jsonp',
          //'data'=>array('bbb','ccc'),
          //'url'=>'http://localhost/trackstar/index.php/sandbox/hello',
          'select'=>"js:function(event,ui){
           //$('#username').val(ui.item.username);
           return false;
           //alert(ui.item.username);
         }",
          'autoFill'=>true,
          'focus'=> 'js:function( event, ui ) {
                        $( "#username" ).val( ui.item.username );
                        return false;
                    }',

      ),
    'htmlOptions'=>array(
        'size'=>'40',
        'autocomplete'=>'off',
    ),


));

?>
<div class="row">
    <?php echo $form->labelEx($model, 'role');    ?>
    <?php echo $form->dropDownList($model,'role',Project::getUserRoleOptions()); ?>
</div>

<div class="row buttons">
    <?php echo CHtml::submitButton('Add User')?>
</div>



<?php $this->endWidget(); ?>

