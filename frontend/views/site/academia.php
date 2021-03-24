<?php
use frontend\models\categories;
use common\models\Company;
use common\models\Companyimages;
use yii\helpers\Arrayhelper;
use common\models\County;
use yii\bootstrap4\Modal;
$companies = Company::find()->joinWith('companyimages')->where(['CategoryId'=>4])->all();
$location=(Arrayhelper::map(county::find()->asArray()->all(),'countyId','countyName'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' >
</head>
<body>
	<div>
		<!-- jumbotron -->
		<div class='row  dark-overlay'>
				<div class='container '>
					<div class="row">
						<div class='m-5 align-items-center justify-content-center'>
							<button class="button searchbtn">Search</button>
						</div>
					</div>
					</div>
				</div>
		</div>
	</div>
	<!-- category results -->
	<div class='row card'>
		<?php foreach($companies as $kampuni){?>
			<?php $countyName = County::find()->where(['countyId'=>$kampuni->countyId])->One()?>
		<div class="media p-1 m-5 h-100">
            <div class="fav-box"><i class="fa fa-heart-o" aria-hidden="true"></i><br>
			<span><a class='btn btn-dark reviewbtn btn-sm'>REVIEW US</a></span>
			</div>
              <img class="d-flex align-self-start" src="<?=yii::$app->request->baseUrl.'/'.$kampuni->companyimages[0]->imagePath?>" alt='company image'>
            <div class="media-body pl-3 ">
                <div class="title"><?=$kampuni->companyName?><small>
				<?=$countyName->countyName?></small>
				</div>
                <div class='reviews'><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                	<p>(20 REVIEWS)</p>
                </div>
                <div class="stats">
                    <span><i class="fa fa-map-marker"></i>Koinange street</span>
                </div>	
            </div>
        </div><hr>
	<?php } ?>

	<?php
	Modal::begin([
		'title'=>'RATING PANEL',
		'size'=>'Modal-xl',
		'id'=>'ratingModal',
	]);
	echo "<div id='ratingContent'></div>";
	Modal::end();
	?>

<?php
	Modal::begin([
		'title'=>'',
		'id'=>'searchby',
		'size'=>'modal-lg',
	]);

	 echo "<div id='searchbyContent'></div>";
	 Modal::end();
	
	?>
        		
    </div>		
</body>
</html>