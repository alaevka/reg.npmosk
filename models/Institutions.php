<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Institutions".
 *
 * @property integer $Inst_ID
 * @property string $Inst_SName
 * @property string $Inst_LName
 * @property string $Inst_Code
 * @property integer $Inst_Attestation
 * @property integer $Inst_Exelence
 *
 * @property Attestates[] $attestates
 * @property Certificates[] $certificates
 */
class Institutions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Institutions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Inst_ID', 'Inst_SName', 'Inst_LName'], 'required'],
            [['Inst_ID', 'Inst_Attestation', 'Inst_Exelence'], 'integer'],
            [['Inst_SName', 'Inst_LName', 'Inst_Code'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Inst_ID' => 'Inst  ID',
            'Inst_SName' => 'Inst  Sname',
            'Inst_LName' => 'Inst  Lname',
            'Inst_Code' => 'Inst  Code',
            'Inst_Attestation' => 'Inst  Attestation',
            'Inst_Exelence' => 'Inst  Exelence',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttestates()
    {
        return $this->hasMany(Attestates::className(), ['Institution_ID' => 'Inst_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCertificates()
    {
        return $this->hasMany(Certificates::className(), ['InstID' => 'Inst_ID']);
    }
}
