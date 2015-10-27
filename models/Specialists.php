<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Specialists".
 *
 * @property integer $Specialist_ID
 * @property integer $C_ID
 * @property string $FirstName
 * @property string $MiddleName
 * @property string $LastName
 * @property integer $PermanentEmpl
 * @property string $University
 * @property string $DiplomaNumb
 * @property string $Specialty
 * @property string $EmpHistNumb
 * @property integer $Declared
 *
 * @property Attestates[] $attestates
 * @property Certificates[] $certificates
 * @property Companies $c
 */
class Specialists extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Specialists';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Specialist_ID', 'C_ID', 'FirstName', 'LastName'], 'required'],
            [['Specialist_ID', 'C_ID', 'PermanentEmpl', 'Declared'], 'integer'],
            [['FirstName', 'MiddleName', 'LastName', 'DiplomaNumb', 'EmpHistNumb'], 'string', 'max' => 45],
            [['University', 'Specialty'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Specialist_ID' => 'Specialist  ID',
            'C_ID' => 'C  ID',
            'FirstName' => 'First Name',
            'MiddleName' => 'Middle Name',
            'LastName' => 'Last Name',
            'PermanentEmpl' => 'Permanent Empl',
            'University' => 'University',
            'DiplomaNumb' => 'Diploma Numb',
            'Specialty' => 'Specialty',
            'EmpHistNumb' => 'Emp Hist Numb',
            'Declared' => 'Declared',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttestates()
    {
        return $this->hasMany(Attestates::className(), ['Specialist_ID' => 'Specialist_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCertificates()
    {
        return $this->hasMany(Certificates::className(), ['SpecialistID' => 'Specialist_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getC()
    {
        return $this->hasOne(Companies::className(), ['C_ID' => 'C_ID']);
    }
}
