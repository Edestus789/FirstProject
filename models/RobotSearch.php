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
class RobotSearch extends Robot {

    /**
      * {@inheritdoc}
      */
    public function rules() {

        return [
            [['id'], 'integer'],
            [['disName'], 'safe'],
            [['yname', 'sname', 'platform', 'weight'], 'safe'],
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
      *
      * @param array $params
      *
      * @return ActiveDataProvider
      */
    public function search($params) {

        $query = Robot::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
          'defaultOrder' => ['id' => SORT_ASC],
          'attributes' => [
              'id',
              'yname',
              'sname',
              'disName' => [
                  'asc' => ['tbl_discipline.Name' => SORT_ASC],
                  'desc' => ['tbl_discipline.Name' => SORT_DESC],
                  'label' => 'disName'
              ],
              'platform',
              'weight',
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'yname', $this->yname])
          ->andFilterWhere(['like', 'sname', $this->sname])
          ->andFilterWhere(['like', 'platform', $this->platform])
          ->andFilterWhere(['like', 'weight', $this->weight]);

        $query->joinWith(['dis' => function ($q) {
            $q->where('tbl_discipline.Name LIKE "%' . $this->disName . '%"');
        }]);

        return $dataProvider;
    }
}
