<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;

?>

<div class="discipline-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')
        ->textInput(['maxlength' => true])
        ->label(Yii::t('common', 'Discipline'))
    ?>

    <?= $form->field($model, 'description')
        ->textInput(['maxlength' => true])
        ->label(Yii::t('common', 'Description'))
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('common', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
