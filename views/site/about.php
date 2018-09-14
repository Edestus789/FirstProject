<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('common', 'About ').Yii::$app->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
    <?php
       echo Yii::t('common', 'This page about ');
       echo Yii::$app->name;
    ?> .
    </p>
</div>
