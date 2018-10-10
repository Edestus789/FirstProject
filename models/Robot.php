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
  * @property string $RName
  * @property string $discipline
  * @property string $Platform
  * @property string $Weight
  */
class Robot extends \yii\db\ActiveRecord {

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
            [['discipline', 'platform'], 'integer'],
            [['yname', 'sname', 'rname'], 'string', 'max' => 30],
            [['weight'], 'string', 'max' => 10],
            [['yname', 'rname', 'discipline', 'platform'], 'required'],
        ];
    }

    /**
      * Relations category discipline
      */
    public function getDiscipln() {

        return $this->hasOne(Discipline::className(), ['id' => 'discipline']);
    }

    /**
      * Relations category platform
      */
    public function getPlatfm() {

        return $this->hasOne(Platform::className(), ['id' => 'platform']);
    }

    /**
      * {@inheritdoc}
      */
    public function attributeLabels() {

        return [
            'id' => 'ID',
            'yname' => Yii::t('common', 'Your name'),
            'sname' => Yii::t('common', 'SupV name'),
            'rname' => Yii::t('common', 'Robot name'),
            'discipline' => Yii::t('common', 'Discipline'),
            'platform' => Yii::t('common', 'Platform'),
            'weight' => Yii::t('common', 'Weight'),
        ];
    }
}

?>
