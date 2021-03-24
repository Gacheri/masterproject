<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\companyimages;
/* @var $this yii\web\View */
/* @var $model frontend\models\Companyimages */
/* @var $form ActiveForm */

?>
<div class="addimages">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'imagePath')->fileInput() ?>
       
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- addimages -->
