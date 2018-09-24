<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="robot-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'yname') ?>

    <?= $form->field($model, 'sname') ?>

    <?= $form->field($model, 'discipline') ?>

    <?= $form->field($model, 'platform') ?>

    <?= $form->field($model, 'weight') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
