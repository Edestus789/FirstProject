<?php

// Function -  raises the current discipline to the top of the list ang sends list.
// Returns the prepared list of discipline names.

namespace app\components;

use Yii;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use app\models\Discipline;

class DinamicListWidget extends Widget {

    public $model;

    public function init(){

        parent::init();
    }

    public function run() {
        
        $model = $this->model;

        $itemsDis = ArrayHelper::map(Discipline::find()->all(), 'id', 'name');

        if(Yii::$app->request->get('r','')=='site/update') {

            $elementDis120 = Discipline::findOne(['name' => $model->discip->name]);

            $elementDis = array( $elementDis120->id => $model->discip->name);

            $itemsDis = $elementDis + $itemsDis;
        }

        return serialize($itemsDis) ;
    }
}

?>
