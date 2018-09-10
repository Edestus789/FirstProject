<?php

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
        // bypass scenarios() implementation in the parent class
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
        // ->where('t1.id = :id')
        ->orderBy('id');
        // //
        // // " SELECT
        //              t1.id as id,
        //              t1.YName as YName,
        //              t1.SName as SName,
        //              t2.Discipline as Discipline,
        //              t1.Platform as Platform,
        //              t1.Weight as Weight
        // //         FROM robot t1 INNER JOIN discipline t2 ON t1.Discipline = t2.id WHERE t1.id = :id
        // //       ";




        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
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

    // public function searchOne($id)
    // {
    //
    //
    //     $query = Robot::find($id)
    //
    //
    //     ->select('t1.id as id,
    //     t1.YName as YName,
    //     t1.SName as SName,
    //     t2.Discipline as Discipline,
    //     t1.Platform as Platform,
    //     t1.Weight as Weight')
    //     ->from('robot t1')
    //     ->innerJoin('discipline t2', 't1.Discipline = t2.id')
    //     ->where('t1.id = '.$id)
    //     ->orderBy('id');
    //     $dataProvider = new ActiveDataProvider([
    //         'query' => $query,
    //     ]);
    //     return $dataProvider;
    // }




}
