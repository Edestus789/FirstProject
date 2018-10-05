<?php

// Function - prepares a list of languages from the database.
// Returns a prepared list of languages..

namespace app\components;

use Yii;
use yii\helpers\ArrayHelper;
use yii\base\Widget;
use app\models\Lang;

class LangListWidget extends Widget {

    public function init(){

        parent::init();
    }

    public function run() {

        $itemsLang = Yii::$app->params['siteLeng'];

        foreach ($itemsLang as $key => $value) {

            $itemsList[$key] = [
                'label' => current($value),
                'url' => [
                    Yii::$app->controller->route,
                    'language' => array_keys($value)[0],
                    'id' => Yii::$app->request->get('id')
                ]
            ];
        }

        return serialize($itemsList) ;
    }
}

?>
