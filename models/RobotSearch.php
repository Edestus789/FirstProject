<?php

//  Robot search Model

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Robot;
use app\models\Discipline;

/**
  * RobotSearch represents the model behind the search form of `app\models\Robot`.
  */
class RobotSearch extends Robot {

    public $disName;

    /**
      * {@inheritdoc}
      */
    public function rules() {

        return [
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
                    'asc' => [Discipline::tableName().'.name' => SORT_ASC],
                    'desc' => [Discipline::tableName().'.name' => SORT_DESC],
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

        $query->andFilterWhere(['like', 'yname', $this->yname])
              ->andFilterWhere(['like', 'sname', $this->sname])
              ->andFilterWhere(['like', 'platform', $this->platform])
              ->andFilterWhere(['like', 'weight', $this->weight])
              ->joinWith(['dis' => function ($q) {
            $q->where(Discipline::tableName().'.name LIKE "%' . $this->disName . '%"');
        }]);

        return $dataProvider;
    }
}

?>
