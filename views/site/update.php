<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('common', 'Update Robot: '). $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Robot'), 'url' => Url::toRoute(['site/index'])];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => Url::toRoute(['view', 'id' => $model->id])];
$this->params['breadcrumbs'][] = 'Update';

?>

<div class="robot-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
