<?php

namespace app\models;

use Yii;
use app\models\Companies;
use yii\data\ActiveDataProvider;

class CompaniesSearch extends Companies
{

    public $LicensesName;

    public function rules()
    {
        // only fields in rules() are searchable
        return [
            [['C_ID'], 'integer'],
            [['C_FName', 'C_INN', 'C_OGRN', 'C_LA_PIndex', 'C_Status', 'LicensesName', 'C_SName'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = Companies::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        $query->joinWith(['licenses'])->groupBy('C_ID');

        $dataProvider->setSort([
            'attributes'=>[
                'C_ID',
                'C_FName'=>[
                    'asc'=>['C_FName'=>SORT_ASC],
                    'desc'=>['C_FName'=>SORT_DESC],
                    'label'=>'Full Name',
                    'default'=>SORT_ASC
                ],
                'C_INN',
                'C_OGRN',
                'C_LA_PIndex',
                'C_Status',
                'LicensesName'=>[
                    'asc'=>['Licenses.Lic_Number'=>SORT_ASC],
                    'desc'=>['Licenses.Lic_Number'=>SORT_DESC],
                    'label'=>'Country Name'
                ]
            ]
        ]);

        // load the search form data and validate
        if (!($this->load($params) && $this->validate())) {
            
            return $dataProvider;
        }

        // adjust the query by adding the filters
        $query->andFilterWhere(['C_ID' => $this->C_ID]);
        $query->andFilterWhere(['like', 'C_FName', $this->C_FName]);
        $query->andFilterWhere(['like', 'C_INN', $this->C_INN]);
        $query->andFilterWhere(['like', 'C_OGRN', $this->C_OGRN]);
        $query->andFilterWhere(['like', 'C_LA_PIndex', $this->C_LA_PIndex]);
        $query->andFilterWhere(['like', 'C_Status', $this->C_Status]);

        $query->joinWith(['licenses'=>function ($q) {
            $q->where('Licenses.Lic_Number LIKE "%' . 
                $this->LicensesName . '%"');
        }]);

       
        return $dataProvider;
    }


    public function searchsubd($params)
    {
        $query = Companies::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            
        ]);
        
        // load the search form data and validate
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        return $dataProvider;
    }
}