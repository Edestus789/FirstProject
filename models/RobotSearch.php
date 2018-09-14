<?php

//  Robot search Model

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Robot;

/**
  * RobotSearch represents the model behind the search form of `app\models\Robot`.
  */
class RobotSearch extends Robot
{
    /**
      * {@inheritdoc}
      */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['YName', 'SName', 'Discipline', 'Platform', 'Weight'], 'safe'],
        ];
    }

    /**
      * {@inheritdoc}
      */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
      * Creates data provider instance with search query applied
      *
      * @param array $params
      *
      * @return ActiveDataProvider
      */
    public function search($params)
    {
        $query = Robot::find()
        ->select('t1.id as id,
          t1.YName as YName,
          t1.SName as SName,
          t2.Discipline as Discipline,
          t1.Platform as Platform,
          t1.Weight as Weight')
        ->from('robot t1')
        ->innerJoin('discipline t2', 't1.Discipline = t2.id')
        ->orderBy('id');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'YName', $this->YName])
            ->andFilterWhere(['like', 'SName', $this->SName])
            ->andFilterWhere(['like', 'Discipline', $this->Discipline])
            ->andFilterWhere(['like', 'Platform', $this->Platform])
            ->andFilterWhere(['like', 'Weight', $this->Weight]);

        return $dataProvider;
    }
}
