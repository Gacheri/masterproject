<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "rating".
 *
 * @property int $ratingId
 * @property int $reviewId
 * @property int $createdBy
 * @property string $createdAt
 *
 * @property Companyrating[] $companyratings
 * @property User $createdBy0
 * @property Review $review
 */
class Rating extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rating';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reviewId', 'createdBy'], 'required'],
            [['reviewId', 'createdBy'], 'integer'],
            [['createdAt'], 'safe'],
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
            'ratingId' => 'Rating ID',
            'reviewId' => 'Review ID',
            'createdBy' => 'Created By',
            'createdAt' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Companyratings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyratings()
    {
        return $this->hasMany(Companyrating::className(), ['ratingId' => 'ratingId']);
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
