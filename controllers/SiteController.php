<?php

//  Site Controller

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Robot;
use app\models\RobotSearch;
use app\models\DisciplineClass;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
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
    * Finds the Robot model based on its primary key value.
    * If the model is not found, a 404 HTTP exception will be thrown.
    * @param integer $id
    * @return Robot the loaded model
    * @throws NotFoundHttpException if the model cannot be found
    */
  protected function findModel($id='')
  {
    $id = $this->bufID($id);

    $model = Robot::find()
        ->select('t1.id as id,
        t1.YName as YName,
        t1.SName as SName,
        t2.Discipline as Discipline,
        t1.Platform as Platform,
        t1.Weight as Weight')
        ->from('robot t1')
        ->innerJoin('discipline t2', 't1.Discipline = t2.id')
        ->where("t1.id = {$id}")
        ->one();

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
    * Searches and corrects collisions.
    */
  private function fixCollision()
  {
      $itemsDis15 = \yii\helpers\ArrayHelper::map(Robot::find()
        ->all(), 'id', 'Discipline');

      $itemsDis16 = \yii\helpers\ArrayHelper::map(DisciplineClass::find()
        ->all(), 'Discipline', 'id');

      foreach ($itemsDis15 as $key => $value1) {
          $i = false;
          foreach ($itemsDis16 as &$value2) {
              if($value1 == $value2){
                  $i=true;
              }
          }
          if($i == false){
              $rowRobot= Robot::findOne($key);
              $rowRobot->Discipline  = '1';
              $rowRobot->save();
          }
      }
  }

  /**
    * Lists all Robot models.
    * @return mixed
    */
  public function actionIndex()
  {
      $this->fixCollision();

      $searchModel = new RobotSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      return $this->render('index', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
      ]);
  }

  /**
    * Displays a single Robot model.
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
    * Creates a new Robot model.
    * If creation is successful, the browser will be redirected to the 'view' page.
    * @return mixed
    */
  public function actionCreate()
  {
      $model = new Robot();

      if ($model->load(Yii::$app->request->post()) && $model->save()) {
          return $this->redirect(['view', 'id' => $model->id]);
      }

      return $this->render('create', [
          'model' => $model,
      ]);
  }

  /**
    * Updates an existing Robot model.
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
    * Deletes an existing Robot model.
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

  /**
   * Displays about page.
   *
   * @return string
   */
  public function actionAbout()
  {
      return $this->render('about');
  }
}

?>
