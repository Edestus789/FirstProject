<?php

//  Discipline Model

namespace app\models;

use Yii;

/**
  * This is the model class for table "discipline".
  *
  * @property int $id
  * @property string $Discipline
  * @property string $Description
  */
class DisciplineClass extends \yii\db\ActiveRecord
{
    /**
      * {@inheritdoc}
      */
    public static function tableName()
    {
        return 'discipline';
    }

    /**
      * {@inheritdoc}
      */
    public function rules()
    {
        return [
            [['Discipline'], 'string', 'max' => 30],
            [['Description'], 'string', 'max' => 200],
            [['Discipline'], 'required'],
        ];
    }

    /**
      * {@inheritdoc}
      */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Discipline' => 'Discipline',
            'Description' => 'Description',
        ];
    }
}
