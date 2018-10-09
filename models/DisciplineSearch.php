<?php

//  Discipline search Model

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Discipline;
use yii\helpers\ArrayHelper;

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

    /**
      * Function -  raises the current discipline to the top of the list ang sends name discipline list.
      * Returns the prepared list of discipline names.
      * @param array $model
      * @return array $itemsDis
      */
    static public function getListDiscipline($model) {

        $itemsDis = ArrayHelper::map(Discipline::find()->all(), 'id', 'name');

        if(Yii::$app->request->get('r','')=='site/update') {

            $elementDis120 = Discipline::findOne(['name' => $model->discip->name]);

            $elementDis = array($elementDis120->id => $model->discip->name);

            $itemsDis = $elementDis + $itemsDis;
        }

        return $itemsDis;
    }
}

?>
