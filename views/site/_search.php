<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RobotSearch */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="robot-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'YName') ?>

    <?= $form->field($model, 'SName') ?>

    <?= $form->field($model, 'Discipline') ?>

    <?= $form->field($model, 'Platform') ?>

    <?= $form->field($model, 'Weight') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
