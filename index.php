<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8">
<title>JavaScript Form Validation using a sample registration form</title>
<meta name="keywords" content="example, JavaScript Form Validation, Sample registration form" />
<meta name="description" content="This document is an example of JavaScript Form Validation using a sample registration form. " />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel='stylesheet' href='css/js-form-validation.css' type='text/css' />
<script src="js/registation-form-validation.js"></script>
</head>
<body onload="document.registration.userid.focus();">
<h1><center>Registration Form</center></h1>

<form name='registration' onSubmit="return formValidation();" action="formdatainsert.php" method="post" >

<div class="container">
  <div class="row">
  <div class="col-2"></div>
		<div class="col-8">
		
		<!--<form  action="formdatainsert.php" method="post" >-->
					  <div class="form-group">
						<label>Buyer Name</label>
						<input type="text" class="form-control" size="20" name="buyername" placeholder="UserName">
					  </div>
					   <div class="form-group">
						<label>Buyer Email</label>
						<input type="email" class="form-control" name="email" placeholder="example@mail.com">
					  </div>
					  <div class="form-group">
						<label>City</label>
						<input type="text" class="form-control" name="city" placeholder="City">
					  </div>
					   <div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control" name="phone" size="10" placeholder="Phone Number">
					  </div>
						<div class="form-group">
						<label>Amount</label>
						<input type="text" maxlength="10" name="amount" class="form-control" placeholder="Amount">
					  </div>
					   <div class="form-group">
						<label>Receipt ID</label>
						<input type="text" class="form-control" name="receiptid" size="20" placeholder="Receipt ID">
					  </div>
					   <div class="form-group">
						<label>Note</label>
						<input type="text" class="form-control" name="note" size="30" placeholder="Note">
					  </div>

						<button onclick="myFunction()">HaveCoupon</button>

						<div class="" id="myDIV">

							<input type="text" class="form-control" name="coupon" size="5" placeholder="Enter Your Coupon">
						</div>

					  
					  <button type="submit" name="submit"  class="btn btn-primary">Submit</button>
					  
			</form>
					  
					  
					  </div>
  
 
    <div class="col-2"></div>
  </div>
</div>

<!--</form>-->

<script>

function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

</script>





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
