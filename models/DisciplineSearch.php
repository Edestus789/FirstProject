<?php

//  Discipline search Model

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DisciplineClass;

/**
  * DisciplineSearch represents the model behind the search form of `app\models\Robot`.
  */
class DisciplineSearch extends DisciplineClass
{
    /**
      * {@inheritdoc}
      */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['Discipline', 'Description'], 'safe'],
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
      * @param array $params
      * @return ActiveDataProvider
      */
    public function search($params)
    {
        $query = DisciplineClass::find();

        $dataProviderDis = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProviderDis;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'Discipline', $this->Discipline])
            ->andFilterWhere(['like', 'Description', $this->Description]);

        return $dataProviderDis;
    }
}
