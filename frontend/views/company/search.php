<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\CompanySearch;
use yii\helpers\Arrayhelper;
use common\models\Category;
use common\models\County;
/* @var $this yii\web\View */
/* @var $model frontend\models\CompanySearch */
/* @var $form yii\widgets\ActiveForm */

$model=new CompanySearch();
?>

<div class="company-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
        <div class='row p-2'>
        <div class="col-md-5">
        <?= $form->field($model, 'companyName')->label('search by company')?>
        </div>
        <!-- <div class="col-md-3">
        <?= $form->field($model, 'categoryId')->label('search by category')->Input(Arrayhelper::map(category::find()->asArray()->all(),'categoryId','categoryName'))?>
        </div> -->
        <div class="col-md-5">
        <?= $form->field($model, 'countyId')->label('search by location')->dropDOwnList(
            Arrayhelper::map(
                county::find()->asArray()->all(),'countyId','countyName')
                )?>
        </div>
        <div class="col-md-2">
        <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'searchbtn2 mt-3']) ?>
        </div>
        </div>  
    </div>

    <?php // echo $form->field($model, 'companyEmail') ?>

    <?php // echo $form->field($model, 'createdAt') ?>

    <?php // echo $form->field($model, 'createdBy') ?>

    

    <?php ActiveForm::end(); ?>

</div>
