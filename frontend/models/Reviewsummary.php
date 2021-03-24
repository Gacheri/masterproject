<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "reviewsummary".
 *
 * @property int $bucketId
 * @property int $companyId
 * @property int $reviewId
 * @property float $rateScore
 * @property int $createdBy
 * @property string $createdAt
 *
 * @property Company $company
 * @property User $createdBy0
 * @property Review $review
 */
class Reviewsummary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reviewsummary';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['companyId', 'reviewId', 'createdBy'], 'required'],
            [['companyId', 'reviewId', 'createdBy'], 'integer'],
            [['rateScore'], 'number'],
            [['createdAt'], 'safe'],
            [['companyId'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['companyId' => 'companyId']],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
            [['reviewId'], 'exist', 'skipOnError' => true, 'targetClass' => Review::className(), 'targetAttribute' => ['reviewId' => 'reviewId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bucketId' => 'Bucket ID',
            'companyId' => 'Company ID',
            'reviewId' => 'Review ID',
            'rateScore' => 'Rate Score',
            'createdBy' => 'Created By',
            'createdAt' => 'Created At',
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
     * Gets query for [[CreatedBy0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy0()
    {
        return $this->hasOne(User::className(), ['id' => 'createdBy']);
    }

    /**
     * Gets query for [[Review]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReview()
    {
        return $this->hasOne(Review::className(), ['reviewId' => 'reviewId']);
    }
}
