<?php

//  Platform Controller

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Platform;
use app\models\PlatformSearch;
use yii\web\NotFoundHttpException;

class PlatformController extends GeneralSiteController {

    /**
      * Finds the Platform model based on its primary key value.
      * If the model is not found, a 404 HTTP exception will be thrown.
      * @param integer $id
      * @return Platform the loaded model
      * @throws NotFoundHttpException if the model cannot be found
      */
    protected function findModel($id) {

        $model = Platform::findOne($id);

        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
      * Lists all Platform models.
      * @return mixed
      */
    public function actionIndex() {

        $searchModel = new PlatformSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
      * Creates a new Platform model.
      * If creation is successful, the browser will be redirected to the 'view' page.
      * @return mixed
      */
    public function actionCreate() {

        $model = new Platform();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
}

?>
