<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */

$this->title = Yii::$app->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="robot-index">

    <div class="jumbotron">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <p>
        <?= Html::a('Create Robot', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="body-content">

      <?= GridView::widget([
          'dataProvider' => $dataProvider,
          'filterModel' => $searchModel,
          'columns' => [
              ['class' => 'yii\grid\SerialColumn'],

              'id',
              'YName',
              'SName',
              'Discipline',
              'Platform',
              'Weight',

              ['class' => 'yii\grid\ActionColumn'],
          ],
      ]); ?>
    </div>
</div>
