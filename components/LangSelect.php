<?php

// Function - language selection, application and retention.

namespace app\components;

use Yii;
use yii\base\Component;
use yii\filters\AccessControl;
use yii\web\Cookie;

class LangSelect extends Component {

    public function select() {

        $request = Yii::$app->request;
        $get = $request->get('language','');

        $session = Yii::$app->session;
        $cookiesReq = Yii::$app->request->cookies;

        /**
          *  Queries the cookie,
          *  if they exist, the application language accepts them.
          *  Otherwise takes the default application language.
          *  When you change the language writes it to the session or cookies.
          *  Sets a cookie with a lifetime of 86400, 1 day.
          */
        if ($cookiesReq->get('language') !== null) {

            $cookiesRes = Yii::$app->response->cookies;

            if($get!=''){

                Yii::$app->language = $get;
                $cookiesRes->add(new Cookie([
                    'name' => 'language',
                    'value' => $get,
                    'expire' => 86400,
                ]));

            } else {

                Yii::$app->language = $cookiesReq->get('language');
            }

        } else {

            if($get!=''){

                Yii::$app->language = $get;
                $session->set('language', $get);

            } else {

                Yii::$app->language = $session->get('language');
            }
        }
    }
}

?>
