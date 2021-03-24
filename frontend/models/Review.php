<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property int $reviewId
 * @property int $companyId
 * @property int $rateScore
 * @property string $reviewDesc
 * @property int $createdBy
 * @property string $createdAt
 *
 * @property Rating[] $ratings
 * @property Company $company
 * @property User $createdBy0
 * @property Reviewsummary[] $reviewsummaries
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['companyId', 'reviewDesc', 'createdBy'], 'required'],
            [['companyId', 'rateScore', 'createdBy'], 'integer'],
            [['reviewDesc'], 'string'],
            [['createdAt'], 'safe'],
            [['companyId'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['companyId' => 'companyId']],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'reviewId' => 'Review ID',
            'companyId' => 'Company ID',
            'rateScore' => 'Rate Score',
            'reviewDesc' => 'Review Desc',
            'createdBy' => 'Created By',
            'createdAt' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Ratings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRatings()
    {
        return $this->hasMany(Rating::className(), ['reviewId' => 'reviewId']);
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
     * Gets query for [[Reviewsummaries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviewsummaries()
    {
        return $this->hasMany(Reviewsummary::className(), ['reviewId' => 'reviewId']);
    }
}
