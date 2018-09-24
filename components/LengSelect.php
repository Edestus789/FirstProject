<?php

// Function language selection, application and retention.

namespace app\components;

use Yii;
use yii\base\Component;
use yii\filters\AccessControl;

class LengSelect extends Component {

    public function select() {

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
                \Yii::$app->language = $session->get('language');
            break;

            default:
            break;
        }
    }
}

?>
