<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo  Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>
<body style="margin-top: 100px;";>
<?php $this->beginBody() ?>
	<?php
		NavBar::begin([
			'brandLabel' => 'Home',
			'brandUrl' => Yii::$app->homeUrl,
			'options' => [
				'class' => 'navbar-inverse navbar-fixed-top',
			],
		]);
		NavBar::end();
	?>

	<div class="container">
		<?php if (Yii::$app->session->hasFlash('success')): ?>
			<div class="alert alert-success">
				<?php echo Yii::$app->session->getFlash('success'); ?>
			</div>
		<?php elseif (Yii::$app->session->hasFlash('error')): ?>
			<div class="alert alert-danger">
				<?php echo Yii::$app->session->getFlash('error'); ?>
			</div>
		<?php endif; ?>
		<?php echo  $content ?>
	</div>

	<footer class="footer">
		<div class="container">
			<p class="pull-left"><?php echo  Yii::powered() ?></p>
			<p class="pull-right">
				Looking for more cool stuff? Be sure to checkout <?php echo Html::a('my blog', 'https://www.erianna.com'); ?>
			</p>
		</div>
	</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>