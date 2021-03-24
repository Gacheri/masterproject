<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $companyId
 * @property string $companyName
 * @property int $categoryId
 * @property int $countyId
 * @property int $phone
 * @property string $companyEmail
 * @property string $createdAt
 * @property int $createdBy
 *
 * @property Category $category
 * @property User $createdBy0
 * @property County $county
 * @property Companyimages[] $companyimages
 * @property Companyrating[] $companyratings
 * @property Review[] $reviews
 * @property Reviewsummary[] $reviewsummaries
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['companyName', 'categoryId', 'countyId', 'phone', 'companyEmail', 'createdBy'], 'required'],
            [['categoryId', 'countyId', 'phone', 'createdBy'], 'integer'],
            [['createdAt'], 'safe'],
            [['companyName', 'companyEmail'], 'string', 'max' => 512],
            [['categoryId'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['categoryId' => 'categoryId']],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
            [['countyId'], 'exist', 'skipOnError' => true, 'targetClass' => County::className(), 'targetAttribute' => ['countyId' => 'countyId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'companyId' => 'Company ID',
            'companyName' => 'Company Name',
            'categoryId' => 'Category ID',
            'countyId' => 'County ID',
            'phone' => 'Phone',
            'companyEmail' => 'Company Email',
            'createdAt' => 'Created At',
            'createdBy' => 'Created By',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['categoryId' => 'categoryId']);
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
     * Gets query for [[County]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCounty()
    {
        return $this->hasOne(County::className(), ['countyId' => 'countyId']);
    }

    /**
     * Gets query for [[Companyimages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyimages()
    {
        return $this->hasMany(Companyimages::className(), ['companyId' => 'companyId']);
    }

    /**
     * Gets query for [[Companyratings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyratings()
    {
        return $this->hasMany(Companyrating::className(), ['companyId' => 'companyId']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::className(), ['companyId' => 'companyId']);
    }

    /**
     * Gets query for [[Reviewsummaries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviewsummaries()
    {
        return $this->hasMany(Reviewsummary::className(), ['companyId' => 'companyId']);
    }
}
