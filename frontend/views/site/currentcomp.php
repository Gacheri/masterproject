<?php
use common\models\User;
use common\models\Company;
use commonfrontend\models\Companyimages;
use common\models\County;
use common\models\Category;
use yii\helpers\Url;
use yii\bootstrap4\Modal;
$subscriber = user::find()->count();
$company = company::find()->count();
$companies= Company::find()->joinWith('companyimages')->all();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' >
    <title>Document</title>
</head>
<body> 
    <nav class='adminpanel'>
        <h5>ADMIN PANEL</h5> 
    </nav>
    <div class='container-fluid row align-items-center justify-content-center d-flex'>
        <div class='col-md-6'>
        <a href="adminpage" style='color:inherit;text-decoration:none;'>
        <div class="card">
                <div class='card-body'>
                <div class="row">
                <div class="col-sm-4">
                    <i class="fa fa-user-o fa-5x" aria-hidden="true"></i>
                    </div>
                <div class='col-md-8'>
                    <p style='text-align:center;'>( <?= $subscriber?> )</p>
                    <P style='text-align:center;'>CURRENT SUBSCRIBERS</P>
                </div>
                </div>     
                </div>  
            </div>
        </a>    
        </div>
        <div class='col-md-6'>
        <a href="#" style='color:inherit;text-decoration:none;'>
        <div class="card" style='background-color:yellow;'>
                <div class='card-body'>
                <div class="row">
                <div class="col-sm-4">
                <i class="fa fa-briefcase fa-5x" aria-hidden="true"></i>
                    </div>
                <div class='col-md-8'>
                <p style='text-align:center;'>( <?= $company?> )</p>
                    <P style='text-align:center;'>CURRENT COMPANIES</P>
                </div>
                </div>  
                </div>
            </div>
        </div>
        </a>
        
    </div>
    <div class=' row justify-content-center align-self-baseline'>

    <?php
       foreach ($companies as $listing) {
        //  if (++$i > 3) break; ?>
        <?php 
        $location = County::find()->where(['countyId'=>$listing->countyId])->One();
        $category = Category::find()->where(['categoryId'=>$listing->categoryId])->One();
        $createdby = User::find()->where(['id'=>$listing->createdBy])->One();
        
        ?>
        <div class='m-5 p-4 card single-listing-card'>
            <img class="card-img-top " src="<?= Yii::$app->request->baseUrl.'/'.$listing->companyimages[0]->imagePath ?>" alt="company image">
            
            <h4 class="card-title"><?=$listing->companyName?></h4>
           <h6 class="card-title"> <i class="fa fa-map-marker  pr-2" aria-hidden="true"></i><?=$location->countyName?></h6>
            <p class="card-title"><?=$category->categoryName?></p>
            <p class="card-title"><?=$createdby->username?></p>
            <div class='reviews'><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                <p>(20 REVIEWS)</p>
                </div>
            <a href="../company/update?id=<?= $listing->companyId?>" class="btn btn-primary btnedit" role="button">EDIT</a>
            <a href="../company/delete?id=<?= $listing->companyId?>" class="btn btn-danger btnedit mt-4" role="button">DELETE</a>
        </div>
       <?php }?>
    </div>
    <?php
	Modal::begin([
		'title'=>'',
		'id'=>'edit',
		'size'=>'modal-lg'
	]);

	 echo "<div id='editContent'></div>";
	 Modal::end();
	
	?>
</body>
</html>