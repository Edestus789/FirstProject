<?php

//  Discipline Controller

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Discipline;
use app\models\DisciplineSearch;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;

class DisciplineController extends GeneralSiteController {

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
      * Function -  raises the current discipline to the top of the list ang sends name discipline list.
      * Returns the prepared list of discipline names.
      * @param array $model
      * @return array $itemsDis
      */
    static public function getListDiscipline($model) {

        $itemsDis = ArrayHelper::map(Discipline::find()->all(), 'id', 'name');

        if(Yii::$app->request->get('r','')=='site/update') {

            $elementDis120 = Discipline::findOne(['name' => $model->discip->name]);

            $elementDis = array($elementDis120->id => $model->discip->name);

            $itemsDis = $elementDis + $itemsDis;
        }

        return $itemsDis;
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
}

?>
