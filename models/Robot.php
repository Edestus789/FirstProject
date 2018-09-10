<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "robot".
 *
 * @property int $id
 * @property string $YName
 * @property string $SName
 * @property string $Discipline
 * @property string $Platform
 * @property string $Weight
 */
class Robot extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'robot';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['YName', 'SName', 'Discipline', 'Platform'], 'string', 'max' => 30],
            [['Weight'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'YName' => 'Yname',
            'SName' => 'Sname',
            'Discipline' => 'Discipline',
            'Platform' => 'Platform',
            'Weight' => 'Weight',
        ];
    }
}
