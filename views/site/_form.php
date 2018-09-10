<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;

/* @var $this yii\web\View */
/* @var $model app\models\Robot */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="robot-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'YName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SName')->textInput(['maxlength' => true]) ?>







    <!-- <?= $form->field($model, 'Discipline')->textInput(['maxlength' => true]) ?> -->


      <?= $form->field($model, 'Discipline',[])->dropDownList([
    'Активный','Отключен','Удален'
  ],['prompt' => 'Выберите дисциплину...'])->label('Discipline <a href="https://yandex.ru/">[edit]</a>');


      ?>






    <?= $form->field($model, 'Platform')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Weight')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
