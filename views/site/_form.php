<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use app\models\DisciplineSearch;
use app\models\PlatformSearch;

?>

<div class="robot-form">

    <?php $form = ActiveForm::begin();?>

    <?= $form->field($model, 'yname')
        ->textInput(['maxlength' => true])
        ->label(Yii::t('common', 'Your name'))
    ?>

    <?= $form->field($model, 'sname')
        ->textInput(['maxlength' => true])
        ->label(Yii::t('common', 'SupV name'))
    ?>

    <?= $form->field($model, 'rname')
        ->textInput(['maxlength' => true])
        ->label(Yii::t('common', 'Robot name'))
    ?>

    <?= $form->field($model, 'discipline')
        ->dropDownList(DisciplineSearch::getListDiscipline($model),
            ['prompt' => Yii::t('common', 'Сhoose a discipline')])
        ->label(Yii::t('common', 'Discipline'))
    ?>

    <?= $form->field($model, 'platform')
        ->dropDownList(PlatformSearch::getListPlatform($model),
            ['prompt' => Yii::t('common', 'Сhoose a platform')])
        ->label(Yii::t('common', 'Platform'))
    ?>

    <?= $form->field($model, 'weight')
        ->textInput(['maxlength' => true])
        ->label(Yii::t('common', 'Weight'))
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('common', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
