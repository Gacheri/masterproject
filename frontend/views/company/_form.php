<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\helpers\Arrayhelper;
use common\models\county;
use common\models\category;
use yii\bootstrap4\Activeform;
use common\models\Companyimages;

/* @var $this yii\web\View */
/* @var $model common\models\Company */
/* @var $form yii\widgets\ActiveForm */

$image= new Companyimages;
?>

<div class="company-form p-5 card shadow m-5">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'companyName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoryId')->dropDownList(Arrayhelper::map(category::find()->asArray()->all(),'categoryId','categoryName'))?>

    <?= $form->field($model, 'countyId')->dropDownList(Arrayhelper::map(county::find()->asArray()->all(),'countyId','countyName')) ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'companyEmail')->textInput() ?>

    <!-- add image here -->
    <?= $form->field($image, 'imagePath')->fileInput() ?>

    <?= $form->field($model, 'createdBy')->hiddenInput(['value'=>Yii::$app->user->identity->id])->label(false) ?>

    <?= $form->field($model, 'createdAt')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Next', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
