<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Contact;

class SiteController extends Controller
{
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'contact' => ['post','get'],
                ],
            ],   
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionContact()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $json = Yii::$app->request->getRawBody();
        $data = json_decode($json, true);

        $model = new Contact();
        
        if ($model->load($data) && $model->validate()) {
            $model->save();
            $data = [ "status" => "ok", "message" => "Сообщение отправлено" ];
        } else {
            $data = [ "status" => "error", "message" => "Ошибка" ];
        }

        $data["errors"] = $model->getErrors();

        return $data;
    }

}
