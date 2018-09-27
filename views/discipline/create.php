<?php

use yii\helpers\Html;

$this->title = Yii::t('common', 'Create Discipline');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Discipline'), 'url' => ['discipline/index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="discipline-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
