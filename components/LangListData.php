<?php

// Function - prepares a list of languages from the database.
// Returns a prepared list of languages..

namespace app\components;

use Yii;
use yii\helpers\ArrayHelper;
use yii\base\BaseObject;
use app\models\Lang;

class LangListData extends BaseObject {

    public function getList() {

        $itemsLang = Yii::$app->params['siteLeng'];

        foreach ($itemsLang as $key => $value) {

            $itemsList[$key] = [
                'label' => $value,
                'url' => [
                    Yii::$app->controller->route,
                    'language' => $key,
                    'id' => Yii::$app->request->get('id')
                ]
            ];
        }

        return $itemsList;
    }
}

?>
