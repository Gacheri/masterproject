<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Arrayhelper;
use common\models\County;
use common\models\Company;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;

// var_dump($countyName);
// exit ();
?>
<div class="company-index m-5">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!-- <?= Html::a('Create Company', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'companyId',
            'companyName',
            [
                'label'=>'Phone',
                'attribute'=>'phone'
            ],

            [

                'label' => 'County',

                'format' => 'ntext',

                'value' => 'countyId',

            ],

            // 'countyName',
            // 'categoryId',
            //'countyId',
            // 'phone',
            //'companyEmail:email',
            //'createdAt',
            //'createdBy',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
