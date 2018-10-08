<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use rmrevin\yii\fontawesome\FA;

// Inject CdnFreeAssetBundle for "Font Awesome"
rmrevin\yii\fontawesome\CdnFreeAssetBundle::register($this);

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
                    'encodeLabels' => false,
                    'items' => [
                        ['label' => Yii::t('common', 'Home', 'en'), 'url' => Url::toRoute(['site/index'])],
                        ['label' => Yii::t('common', 'Create Discipline'), 'url' => Url::toRoute(['discipline/index'])],
                        [
                            'label' => FA::icon('flag').' '.Yii::t('common', 'Language'),
                            'items' => Yii::$app->langlistdata->getList()
                        ],
                    ],
                ]);
                NavBar::end();
            ?>

            <div class="container">

                <?= Breadcrumbs::widget([
                    'homeLink' => ['label' => Yii::t('common', 'Home'), 'url' => Url::toRoute(['site/index'])],
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
