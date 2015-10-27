<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionMembers()
    {
        $searchModel = new \app\models\CompaniesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->get());


        return $this->render('members', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionAttestates()
    {
        $searchModel = new \app\models\AttestatesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->get());


        return $this->render('attestates', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionDebtors()
    {
        $searchModel = new \app\models\RegistrydSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->get());


        return $this->render('debtors', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
    
}
