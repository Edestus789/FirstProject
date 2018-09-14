<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;

$r = isset($_GET['r']) ? $_GET['r'] : "";

$itemsDis = yii\helpers\ArrayHelper::map(app\models\DisciplineClass::find()
  ->all(), 'id', 'Discipline');
$elementDis120 = app\models\DisciplineClass::findOne(["Discipline"=>$model->Discipline]);

if($r=='site/update'){
    $elementDis = array($elementDis120->id => $model->Discipline);
    $itemsDis =$elementDis+$itemsDis;
}

?>

<div class="robot-form">

    <?php $form = ActiveForm::begin();
    ?>

    <?= $form->field($model, 'YName')
      ->textInput(['maxlength' => true])
      ->label(Yii::t('common', 'Your name'))
    ?>

    <?= $form->field($model, 'SName')
      ->textInput(['maxlength' => true])
      ->label(Yii::t('common', 'SupV name'))
    ?>

    <?=
        $form->field($model, 'Discipline')->dropDownList(
          $itemsDis,
          [ ($r=='site/update')?"":'prompt' => Yii::t('common', 'Сhoose a discipline')])
            ->label(Yii::t('common', 'Discipline').' '
            .'<a href="http://site.ru/index.php?r=discipline%2Findex">'.Yii::t('common', '[edit]').'</a>');
    ?>

    <?= $form->field($model, 'Platform')
      ->textInput(['maxlength' => true])
      ->label(Yii::t('common', 'Platform'))
    ?>

    <?= $form->field($model, 'Weight')
      ->textInput(['maxlength' => true])
      ->label(Yii::t('common', 'Weight'))
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('common', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
