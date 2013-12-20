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

    <div class="form-group">
        <?php require_once('/var/www/yii2-blog-demo/protected/extensions/recaptchalib.php'); ?>
        <?php echo recaptcha_get_html('6Ld46OMSAAAAAChneFU3Vo2HjEIHj4s8WXgdqiUu'); ?>
    </div>
    <?php echo Html::submitButton('Submit', array('class' => 'btn btn-primary pull-right')); ?>
<?php ActiveForm::end(); ?>
