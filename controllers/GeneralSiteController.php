<?php

// General  site Controller

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\services\LengService;

abstract class GeneralSiteController extends Controller {

    /**
      * {@inheritdoc}
      */
    public function beforeAction($action) {

        LengService::select();

        return parent::beforeAction($action);
    }

    /**
      * {@inheritdoc}
      */
    public function behaviors() {

        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
      * {@inheritdoc}
      */
    public function actions() {

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

    /**
      * Abstract method to override later.
      * @param integer $id
      */
    abstract protected function findModel($id);

    /**
      * Displays a single model.
      * @param integer $id
      * @return mixed
      * @throws NotFoundHttpException if the model cannot be found
      */
    public function actionView($id) {

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
      * Updates an existing model.
      * If update is successful, the browser will be redirected to the 'view' page.
      * @param integer $id
      * @return mixed
      * @throws NotFoundHttpException if the model cannot be found
      */
    public function actionUpdate($id) {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
      * Deletes an existing model.
      * If deletion is successful, the browser will be redirected to the 'index' page.
      * @param integer $id
      * @return mixed
      * @throws NotFoundHttpException if the model cannot be found
      */
    public function actionDelete($id) {

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
}

?>
