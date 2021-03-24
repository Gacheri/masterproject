<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\Breadcrumbs;
use common\models\Company;

/* @var $this yii\web\View */
/* @var $model common\models\Company */
$county = Company::find()->joinWith('county')->all();
$this->title = $model->companyName;
$this->params['breadcrumbs'][] = ['label' => '/ Companies /', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="company-view" >

    <h1 style='align-text:center;'><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->companyId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->companyId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

     <!-- <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'companyId',
            'companyName',
            'categoryId',
            'countyId',
            'phone',
            'companyEmail:email',
            'createdAt',
            'createdBy',
        ],
    ])?>  -->

</div>
