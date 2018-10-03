<?php
namespace app\components;

use Yii;
use yii\base\Component;
use yii\filters\AccessControl;
use yii\web\UrlManager;


class LangUrlManager extends UrlManager {

    public function createUrl($params) {


      $lang = Yii::$app->language;
        // var_dump($lang);
        // echo $lang;
        // // $lang = 'ru';


// echo !(is_null($lang));

        $url = parent::createUrl($params);

// echo $url;


        if(strpos($url, $lang) === true){
// echo "++++";
            return $url;
        } else {
// echo "----";
            // $urlOut = '/'.$lang.$url;
            $urlOut = $lang.$url;
// echo $urlOut;
              // $urlOut = 'ru'.$url;
            return ($urlOut!=NULL)?($urlOut):($url);
        }
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
