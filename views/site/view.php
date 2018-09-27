<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Robot'), 'url' => [Yii::$app->homeUrl]];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="robot-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(Yii::t('common', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?= Html::a(Yii::t('common', 'Delite'), ['delete', 'id' => $model->id],
         [
              'class' => 'btn btn-danger',
              'data' =>
              [
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
            'dis.name',
            'platform',
            'weight',
        ],
    ]) ?>

</div>
