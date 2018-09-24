<?php

// Raises the current discipline to the top of the list.

namespace app\components;

use Yii;
use yii\base\Component;

class DinamicList extends Component {

    public function getList($model, $request) {

        $itemsDis = \yii\helpers\ArrayHelper::map(\app\models\Discipline::find()
          ->all(), 'id', 'name');

        if($request->get('r','')=='site/update') {

            $elementDis120 = \app\models\Discipline::findOne(['name' => $model->dis->name]);

            $elementDis = array( $elementDis120->id => $model->dis->name);

            $itemsDis = $elementDis + $itemsDis;
        }

      return $itemsDis;
    }
}

?>
