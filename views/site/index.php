<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\helpers\Url;
use app\models\RobotSearch;

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
                ['attribute' =>'id', 'label' => 'ID'],
                ['attribute' =>'yname', 'label' => Yii::t('common', 'Your name')],
                ['attribute' =>'sname', 'label' => Yii::t('common', 'SupV name')],
                [
                    'attribute'=>'disName',
                    'label'=>Yii::t('common', 'Discipline'),
                    'format'=>'text',
                    'content'=> function($data){
                        $DisName = $data->getDisName();
                        return $DisName;
                },
                'filter'=> $itemsDis = \yii\helpers\ArrayHelper::map(\app\models\Discipline::find()
                    ->all(), 'name', 'name'),
                ],
                ['attribute' =>'platform', 'label' => Yii::t('common', 'Platform')],
                ['attribute' =>'weight', 'label' => Yii::t('common', 'Weight')],
                ['class' => 'yii\grid\ActionColumn',
                    'header'=>Yii::t('common', 'Actions'),
                    'headerOptions' => ['width' => '58'],
                    'template' => '{view} {update} {delete}',
                ],
            ],
        ]); ?>

    </div>
</div>
