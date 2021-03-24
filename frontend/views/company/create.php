<?php

use yii\helpers\Html;
use yii\bootstrap4\breadcrumbs;
use common\models\Company;
use common\models\Companyimages;

/* @var $this yii\web\View */
/* @var $model common\models\Company */

$this->title = '/ Create Company';
$this->params['breadcrumbs'][] = ['label' => '/   Companies ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-create">

    <h1 class='m-5'>Create your company here</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
