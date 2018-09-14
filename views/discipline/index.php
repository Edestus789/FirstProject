<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */

$this->title = Yii::$app->name.' '.Yii::t('common', 'Disciplines');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="discipline-index">

    <div class="jumbotron">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <p>
        <?= Html::a(Yii::t('common', 'Create Discipline'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="body-content">

      <?= GridView::widget([
          'dataProvider' => $dataProvider,
          'filterModel' => $searchModel,
          'columns' => [
              ['class' => 'yii\grid\SerialColumn'],

              ['attribute' =>'id', 'label' => 'ID'],
              ['attribute' =>'Discipline', 'label' => Yii::t('common', 'Discipline')],
              ['attribute' =>'Discipline', 'label' => Yii::t('common', 'Description')],

              ['class' => 'yii\grid\ActionColumn',
              'header'=> Yii::t('common', 'Actions'),
              'headerOptions' => ['width' => '58'],
              'visibleButtons' => [
                            'delete' => function($data) { return $data->id !== 1; }
                        ],
           'template' => '{view} {update} {delete}',
            ],
          ],
      ]); ?>
    </div>
</div>
