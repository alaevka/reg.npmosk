<?php

namespace app\models;

use Yii;
use app\models\Attestates;
use yii\data\ActiveDataProvider;

class AttestatesSearch extends Attestates
{
    public function rules()
    {
        // only fields in rules() are searchable
        return [
            // [['C_ID'], 'integer'],
            [['Att_Number'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = Attestates::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // load the search form data and validate
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        

        // adjust the query by adding the filters
        //$query->andFilterWhere(['C_ID' => $this->C_ID]);
        //$query->andFilterWhere(['like', 'C_FName', $this->C_FName]);
        //$query->andFilterWhere(['like', 'C_INN', $this->C_INN]);
        
        return $dataProvider;
    }
}