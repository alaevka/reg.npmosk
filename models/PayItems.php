<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "PayItems".
 *
 * @property integer $PI_ID
 * @property string $PI_Name
 * @property string $PI_StartDate
 * @property string $PI_EndDate
 * @property integer $PI_Type
 *
 * @property Payments[] $payments
 */
class PayItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'PayItems';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PI_Name', 'PI_StartDate', 'PI_EndDate'], 'required'],
            [['PI_StartDate', 'PI_EndDate'], 'safe'],
            [['PI_Type'], 'integer'],
            [['PI_Name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PI_ID' => 'Pi  ID',
            'PI_Name' => 'Pi  Name',
            'PI_StartDate' => 'Pi  Start Date',
            'PI_EndDate' => 'Pi  End Date',
            'PI_Type' => 'Pi  Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payments::className(), ['PI_ID' => 'PI_ID']);
    }
}
