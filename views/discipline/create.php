<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('common', 'Create Discipline');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Discipline'), 'url' => Url::toRoute(['discipline/index'])];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="discipline-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
