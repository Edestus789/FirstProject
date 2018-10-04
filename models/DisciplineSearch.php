<?php

//  Discipline search Model

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Discipline;

/**
  * DisciplineSearch represents the model behind the search form of `app\models\Robot`.
  */
class DisciplineSearch extends Discipline {
    /**
      * {@inheritdoc}
      */
    public function rules() {

        return [
            [['name', 'description'], 'safe'],
        ];
    }

    /**
      * {@inheritdoc}
      */
    public function scenarios() {

        return Model::scenarios();
    }

    /**
      * Creates data provider instance with search query applied
      * @param array $params
      * @return ActiveDataProvider
      */
    public function search($params) {

        $query = Discipline::find();

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

        $query->andFilterWhere(['like', 'name', $this->name])
              ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProviderDis;
    }
}

?>
