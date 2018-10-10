<?php

//  Platform Model

namespace app\models;

use Yii;

/**
  * This is the model class for table "platform".
  *
  * @property int $id
  * @property string $Name
  * @property string $Description
  */
class Platform extends \yii\db\ActiveRecord {

    /**
      * {@inheritdoc}
      */
    public static function tableName() {

        return 'tbl_platform';
    }

    /**
      * {@inheritdoc}
      */
    public function rules() {

        return [
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 30],
            [['name'], 'required'],
            [['name'], 'unique'],
            [['description'], 'string', 'max' => 200],
        ];
    }

    /**
      * {@inheritdoc}
      */
    public function attributeLabels() {

        return [
            'id' => 'ID',
            'name' => Yii::t('common', 'Platform'),
            'description' => Yii::t('common', 'Description'),
        ];
    }
}

?>
