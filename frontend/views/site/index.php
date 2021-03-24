<?php
use frontend\models\CompanySearch;
use yii\bootstrap4\Modal;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
$academia = Yii::$app->db->createCommand('SELECT COUNT(*) FROM company WHERE categoryId=:categoryId', [':categoryId' => 4])->queryScalar();
$gym = Yii::$app->db->createCommand('SELECT COUNT(*) FROM company WHERE categoryId=:categoryId', [':categoryId' => 2])->queryScalar();
$hotel = Yii::$app->db->createCommand('SELECT COUNT(*) FROM company WHERE categoryId=:categoryId', [':categoryId' => 3])->queryScalar();
$searchModel= new CompanySearch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <!-- css -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">	
</head>
<body>
<nav class='m-2 d-flex align-items-center justify-content-center search-nav'>
<button class="button searchbtn">Search</button>
</nav>
<div class="row jumbo">
	
</div>
	<div>
		<!-- jumbotron -->
		<div class='row search-space main-search-container dark-overlay'>
				<div class='container '>
					<div class="main-search-input mt-5 row">
						<!-- <div class="main-search-input-item col-md-8">
							<input type="text" placeholder="Search by category, name or location?" value=""/>
						</div> -->
						<div class='col-md-4'>
							
						</div>
					</div>		
				</div>	
			</div>
		</div>
		<!-- categories section -->
	</div>
	<div class='row mb-5' id='categories'>
		<div class='container-fluid'>
			<h3 class="headline">
				<strong class="headline-with-separator">POPULAR CATEGORIES</strong><br><hr>
			</h3>
		</div>

		<div class='container'>
			<div class="d-flex justify-content-center align-items-center">
				<a href="academia" class="category-small-box">
					<img src="../images/education.svg">
					<p class='mt-3'>Academic institutions</p>
					<span>( <?=$academia?> )</span>
				</a>
				<a href="gym" class="category-small-box">
					<img src="../images/gym.svg">
					<p class='mt-3'>Fitness center</p>
					<span>( <?=$gym?> )</span>
				</a>
				<a href="hotel" class="category-small-box">
					<img src="../images/hotel.svg">
					<p class='mt-3'>Hotels</p>
					<span>( <?=$hotel?> )</span>
				</a>
			</div>
		</div>
	</div>

	<!-- How does this work? -->

	<div class='container-fluid mb-5'>
		<div class='row about mt-5'>
			<div class='col-md-3' id='images'>
				<img src="../images/rating2.jpg" class='about-img'>
				<img src="../images/rating.jpg" class='about-img'>
			</div>
			<div class='col-md-5'>
				<div class='story'>
					<h5>LONG STORY SHORT</h5>
					<p>\~ ka_gu_a</p>
					<p>Rate and be rated.</p>
					<h6>Kenyan brands are rising faster than ever before and that's remarkable. We however need to know as service providers, how our consumers feel about our products. As customers, we have a voice to not only provide a better experience for those around us but also to help these establishments grow. That said, Kagua gives you the chance to do just that.</h6>
				</div>
				<div class='story mt-4'>
					<h5>SO HOW DOES THIS WORK ??</h5>
					<h6>Rate, Rate, Rate</h6>
					<p>Come in, look around, search for options as you view through available companies. Rate your favorite spots truthfully and help these businesses thrive. Leave reviews and recommendations.</p><br>
					<h6>Get Rated. Gather reviews </h6>
					<p>This is a space for your bussiness to gather feedback. Log in your business and let your users give feedback on these spots.</p>
				</div>
			</div>
			<div class='col-md-4'>
					<div>
						<strong><p>Get in touch</p></strong>
					</div>
					<form>
						<div class='form-group'>
							<label>Name</label><br>
							<input type="text" name="name" placeholder='Enter your name here' class='input-group-sm mb-3'>
						</div>
						<div class='form-group'>
							<label>mail</label><br>
							<input type="mail" name="email" placeholder='Enter your E-mail address here'>
						</div>
						<div class='form-group'>
							<label>subject</label><br>
							<input type="text" row='3' name="message" placeholder='so.. what is this about??'>
						</div>
						<div class='form-group'>
							<label>Message</label><br>
							<textarea name="name" placeholder='Talk to us....'></textarea> 
						</div>
						<a type="submit" class=' btn btn-success ml-auto' href=''>SAY HI..</a>
					</form>
			</div>
		</div>		
	</div>
	<!-- footer -->

	<?php
	Modal::begin([
		'title'=>'',
		'id'=>'searchby',
		'size'=>'modal-lg',
	]);

	 echo "<div id='searchbyContent'></div>";
	 Modal::end();
	
	?>
	
</body>
</html>
