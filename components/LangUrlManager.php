<?php
namespace app\components;

use Yii;
use yii\base\Component;
use yii\filters\AccessControl;
use yii\web\UrlManager;


class LangUrlManager extends UrlManager {
    public function createUrl($params) {

        $request = Yii::$app->request;

        $session = Yii::$app->session;

        $lang = (''!==$session->get('language'))?$session->get('language'):$request->get('language');
        // $lang = Yii::$app->language;

        $url = parent::createUrl($params);

        if(strpos($url, 'en')||strpos($url, 'ru')){
          return $url;
        }

        return $url == '/' ? '/'.$lang  : '/'.$lang.$url;
    }

    public function parseRequest($request) {

        $urlInfo = $request->getUrl();

        $urlInfo  = str_replace("/en", '', $urlInfo );

        $urlInfo  =str_replace("/ru", '', $urlInfo );

        $request->setUrl($urlInfo) ;

        return parent::parseRequest($request);
    }
}

?>
