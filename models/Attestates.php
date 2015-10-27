<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Attestates".
 *
 * @property integer $Att_ID
 * @property integer $Protocol_ID
 * @property integer $Specialist_ID
 * @property integer $Test_ID
 * @property integer $Institution_ID
 * @property string $Att_Date
 * @property string $Att_Number
 * @property string $Att_DateExp
 * @property string $Att_Works
 * @property integer $Att_NotNOSTROY
 *
 * @property Specialists $specialist
 * @property Institutions $institution
 * @property Protocols $protocol
 * @property Tests $test
 */
class Attestates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Attestates';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Protocol_ID', 'Specialist_ID', 'Test_ID', 'Institution_ID', 'Att_NotNOSTROY'], 'integer'],
            [['Specialist_ID'], 'required'],
            [['Att_Date', 'Att_DateExp'], 'safe'],
            [['Att_Number', 'Att_Works'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Att_ID' => 'Att  ID',
            'Protocol_ID' => 'Protocol  ID',
            'Specialist_ID' => 'Specialist  ID',
            'Test_ID' => 'Test  ID',
            'Institution_ID' => 'Institution  ID',
            'Att_Date' => 'Дата аттестации',
            'Att_Number' => 'Номер аттестата',
            'Att_DateExp' => 'Дата окончания',
            'Att_Works' => 'Att  Works',
            'Att_NotNOSTROY' => 'Att  Not Nostroy',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialist()
    {
        return $this->hasOne(Specialists::className(), ['Specialist_ID' => 'Specialist_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstitution()
    {
        return $this->hasOne(Institutions::className(), ['Inst_ID' => 'Institution_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProtocol()
    {
        return $this->hasOne(Protocols::className(), ['Protocol_ID' => 'Protocol_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTest()
    {
        return $this->hasOne(Tests::className(), ['Test_ID' => 'Test_ID']);
    }
}
