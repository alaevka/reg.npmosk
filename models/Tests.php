<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Tests".
 *
 * @property integer $Test_ID
 * @property integer $Test_Parent
 * @property string $Test_Number
 * @property string $Test_Name
 *
 * @property Attestates[] $attestates
 * @property TestWorks[] $testWorks
 * @property Works[] $works
 */
class Tests extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Tests';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Test_ID', 'Test_Parent', 'Test_Number', 'Test_Name'], 'required'],
            [['Test_ID', 'Test_Parent'], 'integer'],
            [['Test_Number'], 'string', 'max' => 10],
            [['Test_Name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Test_ID' => 'Test  ID',
            'Test_Parent' => 'Test  Parent',
            'Test_Number' => 'Test  Number',
            'Test_Name' => 'Test  Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttestates()
    {
        return $this->hasMany(Attestates::className(), ['Test_ID' => 'Test_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestWorks()
    {
        return $this->hasMany(TestWorks::className(), ['Test_ID' => 'Test_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorks()
    {
        return $this->hasMany(Works::className(), ['Work_ID' => 'Work_ID'])->viaTable('Test_Works', ['Test_ID' => 'Test_ID']);
    }
}
