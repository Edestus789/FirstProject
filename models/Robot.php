<?php

//  Robot Model

namespace app\models;

use Yii;

/**
  * This is the model class for table "robot".
  *
  * @property int $id
  * @property string $yname
  * @property string $SName
  * @property string $discipline
  * @property string $Platform
  * @property string $Weight
  */
class Robot extends \yii\db\ActiveRecord {

  public $discipName;

    /**
      * {@inheritdoc}
      */
    public static function tableName() {
        return 'tbl_robot';
    }

    /**
      * {@inheritdoc}
      */
    public function rules() {

        return [
            [['id'], 'integer'],
            [['discipline'], 'integer'],
            [['yname', 'sname','platform'], 'string', 'max' => 30],
            [['weight'], 'string', 'max' => 10],
            [['yname', 'discipline', 'platform'], 'required'],
        ];
    }

    /**
      * Relations category discipline
      */
    public function getDiscip() {

        return $this->hasOne(Discipline::className(), ['id' => 'discipline']);
    }

    /**
      * {@inheritdoc}
      */
    public function attributeLabels() {

        return [
            'id' => 'ID',
            'yname' => Yii::t('common', 'Your name'),
            'sname' => Yii::t('common', 'SupV name'),
            'discipline' => Yii::t('common', 'Discipline'),
            'platform' => Yii::t('common', 'Platform'),
            'weight' => Yii::t('common', 'Weight'),
        ];
    }
}

?>
