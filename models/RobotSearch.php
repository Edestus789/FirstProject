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

    public $discipName;

    /**
      * {@inheritdoc}
      */
    public function rules() {

        return [
            [['discipline'], 'integer'],
            [['yname', 'sname', 'discipline', 'platform', 'weight', 'discipName'], 'safe'],
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

        $query = Robot::find()->joinWith(['discip']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'id',
                'yname',
                'sname',
                'discipline' => [
                    'asc' => [Discipline::tableName().'.name' => SORT_ASC],
                    'desc' => [Discipline::tableName().'.name' => SORT_DESC],
                    'label' => 'Discipline Name'
                ],
                'platform',
                'weight',
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'yname', $this->yname])
              ->andFilterWhere(['like', 'sname', $this->sname])
              ->andFilterWhere(['like', 'platform', $this->platform])
              ->andFilterWhere(['like', 'weight', $this->weight])
              ->andFilterWhere(['discipline' => $this->discipline]);

        return $dataProvider;
    }
}

?>
