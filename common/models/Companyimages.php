<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "companyimages".
 *
 * @property int $imageId
 * @property int $companyId
 * @property string $imagePath
 *
 * @property Company $company
 */
class Companyimages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companyimages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['companyId', 'imagePath'], 'required'],
            [['companyId'], 'integer'],
            [['imagePath'], 'string', 'max' => 512],
            [['companyId'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['companyId' => 'companyId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'imageId' => 'Image ID',
            'companyId' => 'Company ID',
            'imagePath' => 'Image Path',
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
}
