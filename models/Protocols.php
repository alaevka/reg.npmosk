<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Protocols".
 *
 * @property integer $Protocol_ID
 * @property integer $Mgmt_ID
 * @property integer $Prot_Number
 * @property string $Protocol_Date
 *
 * @property Attestates[] $attestates
 * @property CompEvents[] $compEvents
 * @property LicEvents[] $licEvents
 * @property Licenses[] $licenses
 * @property Managements $mgmt
 */
class Protocols extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Protocols';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Mgmt_ID', 'Prot_Number', 'Protocol_Date'], 'required'],
            [['Mgmt_ID', 'Prot_Number'], 'integer'],
            [['Protocol_Date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Protocol_ID' => 'Protocol  ID',
            'Mgmt_ID' => 'Mgmt  ID',
            'Prot_Number' => 'Prot  Number',
            'Protocol_Date' => 'Protocol  Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttestates()
    {
        return $this->hasMany(Attestates::className(), ['Protocol_ID' => 'Protocol_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompEvents()
    {
        return $this->hasMany(CompEvents::className(), ['Prot_ID' => 'Protocol_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLicEvents()
    {
        return $this->hasMany(LicEvents::className(), ['Prot_ID' => 'Protocol_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLicenses()
    {
        return $this->hasMany(Licenses::className(), ['Prot_ID' => 'Protocol_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMgmt()
    {
        return $this->hasOne(Managements::className(), ['Mgmt_ID' => 'Mgmt_ID']);
    }
}
