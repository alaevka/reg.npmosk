<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Licenses".
 *
 * @property integer $Lic_ID
 * @property string $Lic_Number
 * @property integer $C_ID
 * @property integer $Prot_ID
 * @property string $Lic_DateOfIssue
 * @property string $GenCMax
 * @property integer $GCT_ID
 * @property string $Lic_FormNumbers
 * @property string $Lic_Status
 * @property string $Lic_RequestDate
 * @property string $Lic_RequestNumber
 * @property integer $Lic_OP
 * @property integer $Lic_OO
 * @property integer $Lic_UN
 * @property integer $Lic_AT
 * @property integer $Lic_SK
 * @property integer $Lic_GP
 * @property integer $Lic_notSK
 *
 * @property LicEvents[] $licEvents
 * @property Companies $c
 * @property GenCTypes $gCT
 * @property Protocols $prot
 * @property LicensesWorks[] $licensesWorks
 * @property Works[] $wRKs
 */
class Licenses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Licenses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Lic_Number', 'C_ID'], 'required'],
            [['C_ID', 'Prot_ID', 'GCT_ID', 'Lic_OP', 'Lic_OO', 'Lic_UN', 'Lic_AT', 'Lic_SK', 'Lic_GP', 'Lic_notSK'], 'integer'],
            [['Lic_DateOfIssue', 'Lic_RequestDate'], 'safe'],
            [['Lic_Number'], 'string', 'max' => 29],
            [['GenCMax', 'Lic_FormNumbers', 'Lic_Status'], 'string', 'max' => 45],
            [['Lic_RequestNumber'], 'string', 'max' => 7],
            [['Lic_Number'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Lic_ID' => 'Lic  ID',
            'Lic_Number' => 'Lic  Number',
            'C_ID' => 'C  ID',
            'Prot_ID' => 'Prot  ID',
            'Lic_DateOfIssue' => 'Lic  Date Of Issue',
            'GenCMax' => 'Gen Cmax',
            'GCT_ID' => 'Gct  ID',
            'Lic_FormNumbers' => 'Lic  Form Numbers',
            'Lic_Status' => 'Lic  Status',
            'Lic_RequestDate' => 'Lic  Request Date',
            'Lic_RequestNumber' => 'Lic  Request Number',
            'Lic_OP' => 'Lic  Op',
            'Lic_OO' => 'Lic  Oo',
            'Lic_UN' => 'Lic  Un',
            'Lic_AT' => 'Lic  At',
            'Lic_SK' => 'Lic  Sk',
            'Lic_GP' => 'Lic  Gp',
            'Lic_notSK' => 'Lic Not Sk',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLicEvents()
    {
        return $this->hasMany(LicEvents::className(), ['LicID' => 'Lic_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getC()
    {
        return $this->hasOne(Companies::className(), ['C_ID' => 'C_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGCT()
    {
        return $this->hasOne(GenCTypes::className(), ['GCT_ID' => 'GCT_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProt()
    {
        return $this->hasOne(Protocols::className(), ['Protocol_ID' => 'Prot_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLicensesWorks()
    {
        return $this->hasMany(LicensesWorks::className(), ['LIC_ID' => 'Lic_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWRKs()
    {
        return $this->hasMany(Works::className(), ['Work_ID' => 'WRK_ID'])->viaTable('LicensesWorks', ['LIC_ID' => 'Lic_ID']);
    }
}
