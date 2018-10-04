<?php

// Function - language selection, application and retention.

namespace app\components;

use Yii;
use yii\base\Component;
use yii\filters\AccessControl;

class LengSelect extends Component {

    public function select() {

        $request = Yii::$app->request;
        $get = $request->get('language','');

        $session = Yii::$app->session;
        $cookiesReq = Yii::$app->request->cookies;

        if ($cookiesReq->get('language') !== null) {

            $cookiesRes = Yii::$app->response->cookies;

            switch ($get) {

                case 'en':
                    Yii::$app->language = 'en';
                    $cookiesRes->add(new \yii\web\Cookie([
                        'name' => 'language',
                        'value' => 'en',
                        'expire' => 86400,
                    ]));
                break;

                case 'ru':
                    Yii::$app->language = 'ru';
                    $cookiesRes->add(new \yii\web\Cookie([
                        'name' => 'language',
                        'value' => 'ru',
                        'expire' => 86400,
                    ]));
                break;

                case '':
                    Yii::$app->language = $cookiesReq->get('language');
                break;

                default:
                break;
            }
        }
        else {

            switch ($get) {

                case 'en':
                    Yii::$app->language = 'en';
                    $session->set('language', 'en');
                break;

                case 'ru':
                    Yii::$app->language = 'ru';
                    $session->set('language', 'ru');
                break;

                case '':
                    Yii::$app->language = $session->get('language');
                break;

                default:
                break;
            }
        }
    }
}

?>
