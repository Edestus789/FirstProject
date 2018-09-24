<?php

//  Discipline Controller

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Discipline;
use app\models\DisciplineSearch;
use yii\web\NotFoundHttpException;

class DisciplineController extends Controller {

    /**
      * {@inheritdoc}
      */
    public function beforeAction($action) {

        Yii::$app->lengselect->select();

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
      * Finds the Discipline model based on its primary key value.
      * If the model is not found, a 404 HTTP exception will be thrown.
      * @param integer $id
      * @return Discipline the loaded model
      * @throws NotFoundHttpException if the model cannot be found
      */
    protected function findModel($id) {

        $model = Discipline::findOne($id);

        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
      * Lists all Discipline models.
      * @return mixed
      */
    public function actionIndex() {

        $searchModel = new DisciplineSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
      * Displays a single Discipline model.
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
      * Creates a new Discipline model.
      * If creation is successful, the browser will be redirected to the 'view' page.
      * @return mixed
      */
    public function actionCreate() {

        $model = new Discipline();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
      * Updates an existing Discipline model.
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
      * Deletes an existing Discipline model.
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
