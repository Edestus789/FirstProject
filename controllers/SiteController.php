<?php

//  Site Controller

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Robot;
use app\models\RobotSearch;
use app\models\Discipline;
use yii\web\NotFoundHttpException;

class SiteController extends GeneralSiteController {

    /**
      * Finds the Robot model based on its primary key value.
      * If the model is not found, a 404 HTTP exception will be thrown.
      * @param integer $id
      * @return Robot the loaded model
      * @throws NotFoundHttpException if the model cannot be found
      *
      * When overriding a class, make the first line $model = parent:: find Model($id);
      */
    protected function findModel($id) {
        $model = parent::findModel($id);
        $model = Robot::findOne($id);

        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
      * Lists all Robot models.
      * @return mixed
      */
    public function actionIndex() {

        $searchModel = new RobotSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
      * Creates a new Robot model.
      * If creation is successful, the browser will be redirected to the 'view' page.
      * @return mixed
      */
    public function actionCreate() {

        $model = new Robot();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
}

?>
