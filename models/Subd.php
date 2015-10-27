<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subd".
 *
 * @property integer $C_ID
 * @property string $Periods
 */
class Subd extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subd';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['C_ID'], 'required'],
            [['C_ID'], 'integer'],
            [['Periods'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'C_ID' => 'C  ID',
            'Periods' => 'Periods',
        ];
    }
}
