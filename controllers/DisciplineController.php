<?php

//  Discipline Controller

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\DisciplineClass;
use app\models\DisciplineSearch;
use yii\web\NotFoundHttpException;

class DisciplineController extends Controller
{

  /**
    * {@inheritdoc}
    */
  public function behaviors()
  {
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
    * Buffer current language.
    * {@inheritdoc}
    */
  public function actions()
  {
      $request = Yii::$app->request;
      $get = $request->get('language','');

      $session = Yii::$app->session;

      switch ($get) {
         case 'en':
             \Yii::$app->language = 'en';
             $session->set('language', 'en');
         break;

         case 'ru':
             \Yii::$app->language = 'ru';
             $session->set('language', 'ru');
         break;

         case '':
            \Yii::$app->language  = $session->get('language');
         break;

         default:
         break;
      }

      $session->close();

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
    * @return DisciplineClass the loaded model
    * @throws NotFoundHttpException if the model cannot be found
    */
  protected function findModel($id='')
  {
      $id = $this->bufID($id);

      $model = DisciplineClass::findOne($id);

      if ($model !== null) {
          return $model;
      }

      throw new NotFoundHttpException('The requested page does not exist.');
  }

  /**
    * Buffer id in session.
    * @param integer $id
    * @return integer $id
    */
  protected function bufID($id)
  {
      $session = Yii::$app->session;

      if ($id == ''){
          $id = $session->get('id');
      }
      else {
          $session->set('id', $id);
      }

      $session->close();

      return $id;
  }

  /**
    * Lists all DisciplineClass models.
    * @return mixed
    */
  public function actionIndex()
  {
      $searchModel = new DisciplineSearch();

      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      return $this->render('index', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
      ]);
  }

  /**
    * Displays a single DisciplineClass model.
    * @param integer $id
    * @return mixed
    * @throws NotFoundHttpException if the model cannot be found
    */
  public function actionView($id='')
  {
      $id = $this->bufID($id);

      return $this->render('view', [
          'model' => $this->findModel($id),
      ]);
  }

  /**
    * Creates a new DisciplineClass model.
    * If creation is successful, the browser will be redirected to the 'view' page.
    * @return mixed
    */
  public function actionCreate()
  {
      $model = new DisciplineClass();

      if ($model->load(Yii::$app->request->post()) && $model->save()) {
          return $this->redirect(['view', 'id' => $model->id]);
      }

      return $this->render('create', [
          'model' => $model,
      ]);
  }

  /**
    * Updates an existing DisciplineClass model.
    * If update is successful, the browser will be redirected to the 'view' page.
    * @param integer $id
    * @return mixed
    * @throws NotFoundHttpException if the model cannot be found
    */
  public function actionUpdate($id='')
  {
      $id = $this->bufID($id);
      $model = $this->findModel($id);

      if ($model->load(Yii::$app->request->post()) && $model->save()) {
          return $this->redirect(['view', 'id' => $model->id]);
      }
      return $this->render('update', [
          'model' => $model,
      ]);
  }

  /**
   * Deletes an existing DisciplineClass model.
   * If deletion is successful, the browser will be redirected to the 'index' page.
   * @param integer $id
   * @return mixed
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionDelete($id='')
  {
      $id = $this->bufID($id);
      $this->findModel($id)->delete();

      return $this->redirect(['index']);
  }
}

?>
