<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('common', 'Update Discipline: ') . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Discipline'), 'url' => Url::toRoute(['discipline/index'])];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => Url::toRoute(['view', 'id' => $model->id])];
$this->params['breadcrumbs'][] = Yii::t('common', 'Update');

?>

<div class="discipline-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
