<?php

use yii\helpers\Html;

$this->title = Yii::t('common', 'Create Robot');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Robot'), 'url' => [Yii::$app->homeUrl]];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="robot-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
