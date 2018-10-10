<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = Yii::$app->name.' '.Yii::t('common', 'Platforms');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="platform-index">
    <div class="jumbotron">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <p>
        <?= Html::a(Yii::t('common', 'Create Platform'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="body-content">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                ['attribute' =>'id', 'label' => 'ID'],
                ['attribute' =>'name', 'label' => Yii::t('common', 'Name')],
                ['attribute' =>'description'],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=> Yii::t('common', 'Actions'),
                    'headerOptions' => ['width' => '58'],
                    'visibleButtons' => [
                        'delete' => function($data) { return $data->id !== 1;}
                    ],
                    'template' => '{view} {update} {delete}',
                ],
            ],
        ]); ?>

    </div>
</div>
