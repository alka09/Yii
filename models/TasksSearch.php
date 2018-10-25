<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tables\Tasks;

/**
 * TasksSearch represents the model behind the search form of `app\models\tables\Tasks`.
 */
class TasksSearch extends Tasks
{
    /**
     * {@inheritdoc}
     */

    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['name', 'date', 'description'], 'safe'],
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
        $query = Tasks::find();
       $query->andFilterWhere(['>=', 'creation_date', $this->createdFrom])
            ->andFilterWhere(['<=', 'creation_date', $this->createdTo]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if(!empty($this->fromDate) && empty($this->toDate)) {
            $criteria->condition = "date >= '" .
                strtotime($this->fromDate) .
                "'";
        } elseif(!empty($this->toDate) && empty($this->fromDate)) {
            $criteria->condition = "date <= '" .
                strtotime($this->toDate).
                "'";
        } elseif(!empty($this->toDate) && !empty($this->fromDate)) {
            $criteria->condition = "date  >= '" .
                strtotime($this->fromDate) .
                "' and date <= '" .
                strtotime($this->toDate) .
                "'";
        }

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);




        return $dataProvider;
    }

}
