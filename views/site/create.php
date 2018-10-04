<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('common', 'Create Robot');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Robot'), 'url' => Url::toRoute(['site/index'])];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="robot-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
