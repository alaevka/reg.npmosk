<?php

namespace app\models;

use Yii;
use app\models\Registryd;
use yii\data\ActiveDataProvider;

class RegistrydSearch extends Registryd
{
    public function rules()
    {
        // only fields in rules() are searchable
        return [
            // [['C_ID'], 'integer'],
            [['C_INN', 'C_SName', 'Periods'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = Registryd::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // load the search form data and validate
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        

        // adjust the query by adding the filters
        $query->andFilterWhere(['like', 'C_INN', $this->C_INN]);
        $query->andFilterWhere(['like', 'C_SName', $this->C_SName]);
        $query->andFilterWhere(['like', 'Periods', $this->Periods]);
        
        return $dataProvider;
    }
}