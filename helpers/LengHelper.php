<?php

// Service functions - to work with language.

namespace app\helpers;

use Yii;
use yii\helpers\ArrayHelper;

class LengHelper {

    /**
      * Returns the prepared list of active languages.
      * @return array $itemsList
      */
    static public function getList() {

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

    /**
      * Polls and change the language setting.
      */
    static public function select() {

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
