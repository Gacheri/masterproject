<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap4\Modal;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
	$this->registerCsrfMetaTags();
	$this->registerMetaTag([ 'name'=>'keywords', 'content'=>'kagua','reviews','rate','ratings','hotels','kenya','gyms kenya' ]); 
	$this->registerMetaTag([ 'name'=>'og:site_name', 'content'=>'Kagua.org', ]); 
	?>
	
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?= $this->render('header.php') ?>
    <div>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div><hr>
<div class='foot pt-5'>
		<!-- <div class='row m-3 kaguafooter'>
		<i class="fas fa-greater-than" style='color:white;'></i>
			<img src="../images/logo.png" id='logo' >
		</div> -->
		<div class='row ml-3'>
			<div class='col-md-4 contacts'>
				<strong><p>STAY IN TOUCH</p></strong>
				<p>michenibrenda81@gmail.com</p>
				<p>+254 992 389 95</p>
				<p>356-00200</p>
				<a href="" class='btn btn-success mb-5 locationbtn'>LOCATION</a>
			</div>
			<div class='col-md-5 subscribe'>
				<strong><p>SUBSCRIBE TO OUR NEWSLETTER</p></strong>
				<div class='form-group'>
					<div>
						<input type="text" name="name" placeholder="">
						<input type="email" name="email" placeholder=""><br>
						<button class='btn btn-danger'>SUBSCRIBE</button>
					</div>
				</div>
			</div>
			<div class='col-md-3 socials'>
				<strong><p>REACH US ON OUR SOCIALS</p></strong>
				<div class='row'>
				<a href="https://whatsapp.com" class='social-link'><img src="../images/whatsapp.svg" class='m-auto'></a>
				<a href="https://instagram.com" class='social-link'><img src="../images/instagram.svg" alt='instagram'class='m-auto'></a>
				</div>
				<div class='row'>
				<a href="https://twitter.com" class='social-link'><img src="../images/twitter.svg" alt='twitter' class='m-auto'></a>
				<a href="https://tiktok.com" class='social-link'><img src="../images/tik-tok.svg" alt='tiktok' class='m-auto'></a>
				</div>
			</div>
		</div><hr>
		<div class='row'>
			<p id='copyright'>&#169;copyright KAGUA, 2021</p>
		</div><hr>
	
</div>
<?php 
	Modal::begin([
	'title'=>'YOU CAN FIND US HERE',
	'size'=>'modal-lg',
	'id'=>'location-modal',
	]);
	echo "<div id='locationContent'></div>";
	Modal::end();
?>			
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
