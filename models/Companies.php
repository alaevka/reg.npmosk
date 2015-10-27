<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Companies".
 *
 * @property integer $C_ID
 * @property string $C_SName
 * @property string $C_FName
 * @property string $C_INN
 * @property string $C_OGRN
 * @property string $C_IncForm
 * @property string $C_RegDate
 * @property integer $BO_ID
 * @property integer $C_Expert
 * @property string $C_Status
 * @property string $C_InclDate
 * @property string $C_ExclDate
 * @property string $C_ExclReason
 * @property double $C_SMRCost
 * @property string $C_EmpNumb
 * @property string $C_Licenses
 * @property string $C_Certificates
 * @property string $C_Affiliate
 * @property string $C_Info
 * @property string $C_RegRegion
 * @property string $C_Phone
 * @property string $C_Fax
 * @property string $C_EMail
 * @property string $C_WebSite
 * @property string $C_FPJob
 * @property string $C_FPName
 * @property string $C_CPJob
 * @property string $C_CPName
 * @property string $C_CPPhone
 * @property string $C_CPemail
 * @property string $C_Remarks
 * @property string $C_LA_PIndex
 * @property string $C_LA_Region
 * @property string $C_LA_District
 * @property string $C_LA_City
 * @property string $C_LA_Adress
 * @property string $C_FA_PIndex
 * @property string $C_FA_Region
 * @property string $C_FA_District
 * @property string $C_FA_City
 * @property string $C_FA_Adress
 *
 * @property CompEvents[] $compEvents
 * @property CompFund[] $compFunds
 * @property CompSpecs[] $compSpecs
 * @property Specializations[] $specs
 * @property BranchOffices $bO
 * @property Employees $cExpert
 * @property Contacts[] $contacts
 * @property Form5[] $form5s
 * @property GIPolicies[] $gIPolicies
 * @property GISuppAgrmts[] $sAs
 * @property Info[] $infos
 * @property InsContracts[] $insContracts
 * @property Inspections[] $inspections
 * @property Licenses[] $licenses
 * @property Payments[] $payments
 * @property RealWorks[] $realWorks
 * @property Works[] $wRKs
 * @property Specialists[] $specialists
 */
class Companies extends \yii\db\ActiveRecord
{

    public $license;
    public $address;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Companies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['C_ID', 'C_SName', 'C_FName', 'C_INN', 'C_OGRN', 'C_IncForm', 'C_RegDate', 'C_Status', 'C_RegRegion'], 'required'],
            [['C_ID', 'BO_ID', 'C_Expert', 'C_EmpNumb'], 'integer'],
            [['C_RegDate', 'C_InclDate', 'C_ExclDate'], 'safe'],
            [['C_ExclReason', 'C_Licenses', 'C_Certificates', 'C_Affiliate', 'C_Info', 'C_Remarks'], 'string'],
            [['C_SMRCost'], 'number'],
            [['C_SName', 'C_FName', 'C_CPJob', 'C_CPName', 'C_CPPhone', 'C_CPemail'], 'string', 'max' => 255],
            [['C_INN', 'C_IncForm'], 'string', 'max' => 10],
            [['C_OGRN'], 'string', 'max' => 13],
            [['C_Status'], 'string', 'max' => 30],
            [['C_RegRegion', 'C_EMail', 'C_WebSite'], 'string', 'max' => 100],
            [['C_Phone'], 'string', 'max' => 150],
            [['C_Fax', 'C_FPJob'], 'string', 'max' => 50],
            [['C_FPName'], 'string', 'max' => 60],
            [['C_LA_PIndex', 'C_FA_PIndex'], 'string', 'max' => 8],
            [['C_LA_Region', 'C_LA_District', 'C_LA_City', 'C_FA_Region', 'C_FA_District', 'C_FA_City'], 'string', 'max' => 45],
            [['C_LA_Adress', 'C_FA_Adress'], 'string', 'max' => 130],
            [['C_INN'], 'unique'],
            [['C_OGRN'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'C_ID' => '#',
            'C_SName' => 'Наименование организации',
            'C_FName' => 'Наименование организации',
            'C_INN' => 'ИНН',
            'C_OGRN' => 'ОГРН',
            'C_IncForm' => 'C  Inc Form',
            'C_RegDate' => 'C  Reg Date',
            'BO_ID' => 'Bo  ID',
            'C_Expert' => 'C  Expert',
            'C_Status' => 'Статус',
            'C_InclDate' => 'C  Incl Date',
            'C_ExclDate' => 'C  Excl Date',
            'C_ExclReason' => 'C  Excl Reason',
            'C_SMRCost' => 'C  Smrcost',
            'C_EmpNumb' => 'C  Emp Numb',
            'C_Licenses' => 'C  Licenses',
            'C_Certificates' => 'C  Certificates',
            'C_Affiliate' => 'C  Affiliate',
            'C_Info' => 'C  Info',
            'C_RegRegion' => 'C  Reg Region',
            'C_Phone' => 'C  Phone',
            'C_Fax' => 'C  Fax',
            'C_EMail' => 'C  Email',
            'C_WebSite' => 'C  Web Site',
            'C_FPJob' => 'C  Fpjob',
            'C_FPName' => 'C  Fpname',
            'C_CPJob' => 'C  Cpjob',
            'C_CPName' => 'C  Cpname',
            'C_CPPhone' => 'C  Cpphone',
            'C_CPemail' => 'C  Cpemail',
            'C_Remarks' => 'C  Remarks',
            'C_LA_PIndex' => 'C  La  Pindex',
            'C_LA_Region' => 'C  La  Region',
            'C_LA_District' => 'C  La  District',
            'C_LA_City' => 'C  La  City',
            'C_LA_Adress' => 'C  La  Adress',
            'C_FA_PIndex' => 'C  Fa  Pindex',
            'C_FA_Region' => 'C  Fa  Region',
            'C_FA_District' => 'C  Fa  District',
            'C_FA_City' => 'C  Fa  City',
            'C_FA_Adress' => 'C  Fa  Adress',
            'address' => 'Адрес',
            'LicensesName' => 'Допуск',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompEvents()
    {
        return $this->hasMany(CompEvents::className(), ['C_ID' => 'C_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompFunds()
    {
        return $this->hasMany(CompFund::className(), ['C_ID' => 'C_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompSpecs()
    {
        return $this->hasMany(CompSpecs::className(), ['C_ID' => 'C_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecs()
    {
        return $this->hasMany(Specializations::className(), ['Spec_ID' => 'Spec_ID'])->viaTable('CompSpecs', ['C_ID' => 'C_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBO()
    {
        return $this->hasOne(BranchOffices::className(), ['BO_ID' => 'BO_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCExpert()
    {
        return $this->hasOne(Employees::className(), ['Employ_id' => 'C_Expert']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasMany(Contacts::className(), ['C_ID' => 'C_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForm5s()
    {
        return $this->hasMany(Form5::className(), ['C_ID' => 'C_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGIPolicies()
    {
        return $this->hasMany(GIPolicies::className(), ['C_Id' => 'C_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSAs()
    {
        return $this->hasMany(GISuppAgrmts::className(), ['SA_Id' => 'SA_Id'])->viaTable('GIPolicies', ['C_Id' => 'C_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfos()
    {
        return $this->hasMany(Info::className(), ['C_ID' => 'C_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInsContracts()
    {
        return $this->hasMany(InsContracts::className(), ['C_ID' => 'C_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInspections()
    {
        return $this->hasMany(Inspections::className(), ['C_ID' => 'C_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLicenses()
    {
        return $this->hasOne(Licenses::className(), ['C_ID' => 'C_ID']);
    }

    public function getLicensesName() {
        return $this->licenses->Lic_Number;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payments::className(), ['Comp_ID' => 'C_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealWorks()
    {
        return $this->hasMany(RealWorks::className(), ['C_ID' => 'C_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWRKs()
    {
        return $this->hasMany(Works::className(), ['Work_ID' => 'WRK_ID'])->viaTable('RealWorks', ['C_ID' => 'C_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialists()
    {
        return $this->hasMany(Specialists::className(), ['C_ID' => 'C_ID']);
    }

    public function getSubd()
    {
        return $this->hasOne(Subd::className(), ['C_ID' => 'C_ID']);
    }
}
