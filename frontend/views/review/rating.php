
<!DOCTYPE html>
<html>
<head>
	<title>Rate</title>
	<link rel="stylesheet" href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
</head>
<body id='rate-body'>
	<div class='container star-widget-container'>
		<div class='star-widget'>
			<input type="radio" name="rating1" id='rate-5'>
			<label for='rate-5'class='fa fa-star-o'></label>
			<input type="radio" name="rating1" id='rate-4'>
			<label for='rate-4'class='fa fa-star-o'></label>
			<input type="radio" name="rating1" id='rate-3'>
			<label for='rate-3'class='fa fa-star-o'></label>
			<input type="radio" name="rating1" id='rate-2'>
			<label for='rate-2'class='fa fa-star-o'></label>
			<input type="radio" name="rating1" id='rate-1'>
			<label for='rate-1'class='fa fa-star-o'></label>
			<form id='rate-form'>
				<header></header>
				<div class='textarea' >
					<textarea cols="30" placeholder="Describe your experience..."></textarea>
				</div>	
				<div class='btn'>
					<button type='submit' class='btn btn-success .postbtn'>POST</button>
				</div>
			</form>
			<div class='post'>
				<div class='text'>Thank you for rating us.</div>
				<div class='exit'>Edit</div>
			</div>
					
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script>
		const btn=document.querySelector(".postbtn");
		const post=document.querySelector(".post");
		const widget=document.querySelector(".star-widget");
		const editBtn=document.querySelector(".exit");

		btn.onclick = ()=>{
			widget.style.display="none";
			post.style.display="block";
		editBtn.onclick=()=>{
			widget.style.display="block";
			post.style.display="none";
		}
		return false;
		}
		
	</script>
</body>
</html>