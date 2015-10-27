<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "registryd".
 *
 * @property string $C_INN
 * @property string $C_SName
 * @property string $Periods
 */
class Registryd extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'registryd';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['C_INN', 'C_SName'], 'required'],
            [['Periods'], 'string'],
            [['C_INN'], 'string', 'max' => 10],
            [['C_SName'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'C_INN' => 'ИНН',
            'C_SName' => 'Наименование организации',
            'Periods' => 'Период',
        ];
    }
}
