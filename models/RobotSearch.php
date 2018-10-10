<?php

//  Robot search Model

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Robot;
use app\models\Discipline;
use app\models\Platform;

/**
  * RobotSearch represents the model behind the search form of `app\models\Robot`.
  */
class RobotSearch extends Robot {

    /**
      * {@inheritdoc}
      */
    public function rules() {

        return [
            [['discipline', 'platform'], 'integer'],
            [['yname', 'sname', 'discipline', 'rname', 'weight'], 'safe'],
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

        $query = Robot::find()->joinWith(['platfm'])->joinWith(['discipln']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'id',
                'yname',
                'sname',
                'rname',
                'discipline' => [
                    'asc' => [Discipline::tableName().'.name' => SORT_ASC],
                    'desc' => [Discipline::tableName().'.name' => SORT_DESC],
                    'label' => 'Discipline Name'
                ],
                'platform' => [
                    'asc' => [Platform::tableName().'.name' => SORT_ASC],
                    'desc' => [Platform::tableName().'.name' => SORT_DESC],
                    'label' => 'Platform Name'
                ],
                'weight',
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'yname', $this->yname])
              ->andFilterWhere(['like', 'sname', $this->sname])
              ->andFilterWhere(['like', 'rname', $this->rname])
              ->andFilterWhere(['like', 'weight', $this->weight])
              ->andFilterWhere(['platform' => $this->platform])
              ->andFilterWhere(['discipline' => $this->discipline]);

        return $dataProvider;
    }
}

?>
