<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\controllers\DisciplineController;

$this->title = Yii::$app->name;
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="robot-index">
    <div class="jumbotron">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
        <p>
            <?= Html::a( Yii::t( 'common', 'Create Robot'), Url::toRoute(['site/create']), ['class' => 'btn btn-success']) ?>
        </p>
    <div class="body-content">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                ['attribute' =>'id'],
                ['attribute' =>'yname'],
                ['attribute' =>'sname'],
                [
                    'attribute'=>'discipline',
                    'value' => function($row){return $row->discip->name;},
                    'filter'=> DisciplineController::getListDiscipline($dataProvider->getModels()),
                ],
                ['attribute' =>'platform'],
                ['attribute' =>'weight'],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=>Yii::t('common', 'Actions'),
                    'headerOptions' => ['width' => '58'],
                    'template' => '{view} {update} {delete}',
                ],
            ],
        ]); ?>

    </div>
</div>
