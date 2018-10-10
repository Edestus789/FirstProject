<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('common', 'Create Platform');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Platform'), 'url' => Url::toRoute(['platform/index'])];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="platform-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
