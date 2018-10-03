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

    public $disName;

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

    public function getDis() {

       return $this->hasOne(Discipline::className(), ['id' => 'discipline']);
    }

    public function getDisName() {

       return $this->dis->name;
    }

    /**
      * {@inheritdoc}
      */
    public function attributeLabels() {

        return [
            'id' => 'ID',
            'yname' => Yii::t('common', 'Your name'),
            'sname' => 'sname',
            'discipline' => Yii::t('common', 'Discipline'),
            'platform' => Yii::t('common', 'Platform'),
            'weight' => 'weight',
        ];
    }
}

?>
