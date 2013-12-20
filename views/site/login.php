<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm; 
?>
<?php $form = ActiveForm::begin(array(
    'options' => array('class' => 'form-signin', 'role' => 'form'),
)); ?>
	<h2 class="form-signin-heading">Please sign in</h2>
	<div class="form-group">
	    <?php echo $form->field($model, 'username')->textInput(array('class' => 'form-control')); ?>
	</div>
	<div class="form-group">
	    <?php echo $form->field($model, 'password')->passwordInput(array('class' => 'form-control')); ?>
	</div>
    <?php echo Html::submitButton('Submit', array('class' => 'btn btn-primary pull-right')); ?>
<?php ActiveForm::end(); ?>