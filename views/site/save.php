<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm; 
?>
 
<?php $form = ActiveForm::begin(array(
    'options' => array('class' => 'form-horizontal', 'role' => 'form'),
)); ?>
	<div class="form-group">
	    <?php echo $form->field($model, 'title')->textInput(array('class' => 'form-control')); ?>
	</div>
	<div class="form-group">
	    <?php echo $form->field($model, 'data')->textArea(array('class' => 'form-control')); ?>
	</div>
    <?php echo Html::submitButton('Submit', array('class' => 'btn btn-primary pull-right')); ?>
<?php ActiveForm::end(); ?>