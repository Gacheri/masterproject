<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "companyrating".
 *
 * @property int $crId
 * @property int $companyId
 * @property int $ratingId
 *
 * @property Company $company
 * @property Rating $rating
 */
class Companyrating extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companyrating';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['companyId', 'ratingId'], 'required'],
            [['companyId', 'ratingId'], 'integer'],
            [['companyId'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['companyId' => 'companyId']],
            [['ratingId'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::className(), 'targetAttribute' => ['ratingId' => 'ratingId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'crId' => 'Cr ID',
            'companyId' => 'Company ID',
            'ratingId' => 'Rating ID',
        ];
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['companyId' => 'companyId']);
    }

    /**
     * Gets query for [[Rating]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRating()
    {
        return $this->hasOne(Rating::className(), ['ratingId' => 'ratingId']);
    }
}
