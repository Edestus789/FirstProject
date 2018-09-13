<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;

/* @var $this yii\web\View */
/* @var $model app\models\Robot */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="discipline-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Discipline')->textInput(['maxlength' => true])->label(Yii::t('common', 'Discipline')) ?>

    <?= $form->field($model, 'Description')->textInput(['maxlength' => true])->label(Yii::t('common', 'Description')) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('common', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
