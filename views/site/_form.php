<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;

$request = Yii::$app->request;
// $itemsDis = Yii::$app->dinamiclist->getList($model, $request);
$itemsDis = \yii\helpers\ArrayHelper::map(\app\models\Discipline::find()
  ->all(), 'id', 'name');
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

    <?= $form->field($model, 'discipline')
      ->dropDownList($itemsDis,
       ['prompt' => Yii::t('common', 'Сhoose a discipline')])
      ->label(Yii::t('common', 'Discipline').' '.Html::a(Yii::t('common', '[edit]'), ['discipline/index'], ['class' => 'profile-link']));
    ?>

    <?= $form->field($model, 'platform')
      ->textInput(['maxlength' => true])
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
