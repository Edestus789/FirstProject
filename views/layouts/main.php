<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="wrap">

            <?php

            NavBar::begin([
                    'brandLabel' => Yii::$app->name,
                    'brandUrl' => Url::to(['@web/site/index']),
                    'options' => [
                        'class' => 'navbar-inverse navbar-fixed-top',
                    ],
                ]);
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => [
                        ['label' => Yii::t('common', 'Home'), 'url' => [Yii::$app->homeUrl]],
                        [
                            'label' => (\Yii::$app->language == 'ru')?'Go to English':'Перейти на Русский',
                            'url' => (\Yii::$app->language == 'ru')?
                            ['en/'.\Yii::$app->controller->route,'language' => 'en',  'id' => Yii::$app->request->get('id') ]:
                            ['ru/'.\Yii::$app->controller->route,'language' => 'ru',  'id' => Yii::$app->request->get('id') ],
                        ],
                    ],
                ]);
            NavBar::end();

            ?>

            <div class="container">

              <?= Breadcrumbs::widget([
                  'homeLink' => ['label' => 'Главная', 'url' => Url::to(['@web/site/index'])],
                  'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
              ]) ?>

              <?= Alert::widget() ?>

              <?= $content ?>

            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; Robot Fest <?= date('Y') ?>
                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>

    </body>
</html>

<?php $this->endPage() ?>
