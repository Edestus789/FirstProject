<?php

//  Platform search Model

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Platform;
use yii\helpers\ArrayHelper;

/**
  * PlatformSearch represents the model behind the search form of `app\models\Robot`.
  */
class PlatformSearch extends Platform {
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

        $query = Platform::find();

        $dataProviderPlat = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProviderPlat;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
              ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProviderPlat;
    }

    /**
      * Function -  raises the current platform to the top of the list ang sends name platform list.
      * Returns the prepared list of platform names.
      * @param array $model
      * @return array $itemsPlat
      */
    static public function getListPlatform($model) {

        $itemsPlat = ArrayHelper::map(Platform::find()->all(), 'id', 'name');

        if(Yii::$app->request->get('r','')=='site/update') {

            $elementPlat120 = Platform::findOne(['name' => $model->platfm->name]);

            $elementPlat = array($elementPlat120->id => $model->platfm->name);

            $itemsPlat = $elementPlat + $itemsPlat;
        }

        return $itemsPlat;
    }
}

?>
