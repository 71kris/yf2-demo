<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;
use app\models\Posts;
use app\models\LoginForm;

class SiteController extends Controller
{

	public function behaviors()
	{
		return [
			'access' => [
				'class' => 'yii\web\AccessControl',
				'only' => ['save', 'delete', 'logout'],
				'rules' => [
					[
						'actions' => ['index', 'save', 'delete'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			]
		];
	}

	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			]
		];
	}

	public function actionLogin()
	{
		$this->layout = 'signin';

		if (!\Yii::$app->user->isGuest) {
			$this->goHome();
		}

		$model = new LoginForm();
		if ($model->load($_POST) && $model->login()) {
			return $this->goBack();
		} else {
			return $this->render('login', [
				'model' => $model,
			]);
		}
	}

	public function actionLogout()
	{
		Yii::$app->user->logout();
		return $this->goHome();
	}

	/**
	 * Allows us to view records
	 */
	public function actionIndex()
	{
		$models = Posts::find()->all();
		echo $this->render('index', array('models' => $models));
	}

	/**
	 * Handles deletion of our models
	 * @param int $id 	The $id of the model we want to delete
	 */
	public function actionSave($id=NULL)
	{
		if ($id == NULL)
			$model = new Posts;
		else
			$model = $this->loadModel($id);

        require_once('/var/www/yii2-blog-demo/protected/extensions/recaptchalib.php');

        $privatekey = "6Ld46OMSAAAAAIwT7M5RHyPMQ7WKoQt6MkY0kCz_";

        $resp = false;

        if (isset($_POST["recaptcha_challenge_field"]) && isset($_POST["recaptcha_response_field"]))
            $resp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

        if ($resp !== false && $resp->is_valid)
        {
            if (isset($_POST['Posts']))
            {
                $model->load($_POST);

                if ($model->save())
                {
                    Yii::$app->session->setFlash('success', 'Model has been saved');
                    $this->redirect($this->createUrl('site/save', array('id' => $model->id)));
                }
                else
                    Yii::$app->session->setFlash('error', 'Model could not be saved');
            }
        }
        
        if ($resp !== false && !$resp->is_valid)
        {
            Yii::$app->session->setFlash('error', 'The recaptcha you provide is invalid.');
        }

		echo $this->render('save', array('model' => $model));
	}

	/**
	 * Handles deletion of our models
	 * @param int $id 	The $id of the model we want to delete
	 */
	public function actionDelete($id=NULL)
	{
		$model = $this->loadModel($id);

		if (!$model->delete())
			Yii::$app->session->setFlash('error', 'Unable to delete model');

		$this->redirect($this->createUrl('site/index'));
	}

	/**
	 * Loads our model and throws an exception if we encounter an error
	 * @param int $id 	The $id of the model we want to delete
	 */
	private function loadModel($id)
	{
		$model = Posts::find($id);

		if ($model == NULL)
			throw new HttpException(404, 'Model not found.');

		return $model;
	}
}
