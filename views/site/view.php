<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Robot'), 'url' => Url::toRoute(['site/index'])];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="robot-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>

        <?= Html::a(Yii::t('common', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?= Html::a(Yii::t('common', 'Delite'), ['delete', 'id' => $model->id],
        [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'yname',
            'sname',
            'rname',
            'discipln.name',
            'platfm.name',
            'weight',
        ],
    ]) ?>

</div>
