<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "county".
 *
 * @property int $countyId
 * @property string $countyName
 *
 * @property Company[] $companies
 */
class County extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'county';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['countyName'], 'required'],
            [['countyName'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'countyId' => 'County ID',
            'countyName' => 'County Name',
        ];
    }

    /**
     * Gets query for [[Companies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::className(), ['countyId' => 'countyId']);
    }
}
