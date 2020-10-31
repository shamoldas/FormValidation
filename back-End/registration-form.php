<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $email=$city = $phone = $amount=$receiptid=$note=$coupon="";
$name_err = $email_err=$city_err=$phone_err = $amount_err = $receiptid_err=$note_err=$coupon_err="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    }
 elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9 ]+$/")))){
        $name_err = "Please enter a valid name.";
    }
elseif(strlen($input_name)>=21)
{
 $name_err = "Please enter a name(maximum 20 Character).";
} 
else{
        $name = $input_name;
    }
//email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter a You email.";
    }


elseif (!filter_var($input_email, FILTER_VALIDATE_EMAIL)) {
  $email_err = "Invalid email format";
}
 else{
        $email = $input_email;
    }

    
    // Validate address
    $input_city = trim($_POST["city"]);
    if(empty($input_city)){
        $city_err = "Please enter an City address.";     
    } else{
        $city = $input_city;
    }
    
    // Validate mobile
    $input_phone = trim($_POST["phone"]);
    if(empty($input_phone)){
        $phone_err = "Please enter the  Mobile Number.";     
    } elseif(!ctype_digit($input_phone)){
        $phone_err = "Please enter a positive integer value.";
    } 
elseif(strlen($input_phone)!=10)
{
 $phone_err = "Please enter a phone number(maximum 10 digit).";
} 
else{
        $phone = $input_phone;
    }


   // Validate amount
    $input_amount = trim($_POST["amount"]);
    if(empty($input_amount)){
        $amount_err = "Please enter the  Amount Number.";     
    } elseif(!ctype_digit($input_amount)){
        $amount_err = "Please enter a positive integer value.";
    } 
elseif(strlen($input_amount)==10)
{
 $amount_err = "Please enter a amount(maximum 10 digit).";
} 
else{
        $amount = $input_amount;
    }

   // Validate receipt
    $input_receiptid = trim($_POST["receiptid"]);
    if(empty($input_receiptid)){
        $receiptid_err = "Please enter a ReceiptID.";
    } elseif(!filter_var($input_receiptid, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $receiptid_err = "Please enter a ReceiptID.";
    } 
elseif(strlen($input_receiptid)>=21)
{
 $receiptid_err = "Please enter a ReceiptID(maximum 20 Character).";
} 
else{
        $receiptid = $input_receiptid;
    }

   // Validate note
    $input_note = trim($_POST["note"]);
    if(empty($input_note)){
        $note_err = "Please enter a Note.";
    } elseif(!filter_var($input_note, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $note_err = "Please enter a Text.";
    } 

elseif(strlen($input_note)>=31)
{
 $note_err = "Please enter a Note(maximum 30 Character).";
} 
else{
        $note = $input_note;
    }


  // Validate coupon
    $input_coupon = trim($_POST["coupon"]);
    if(empty($input_coupon)){
        $coupon_err = "Please enter an Coupon.";     
    } else{
        $coupon = $input_coupon;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($city_err) && empty($phone_err)&&empty($email_err) && empty($amount_err) && empty($receeiptid_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO registration (name,email,city, phone,amount,receiptid,note,coupon) VALUES (?, ?, ?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss", $param_name,$param_email,$param_city, $param_phone, $param_amount,$param_receiptid,$param_note,$param_coupon);
            
            // Set parameters
            $param_name = $name;
	    $param_email=$email;
	    $param_city=$city;
            $param_phone = $phone;
            $param_amount = $amount;
            $param_receiptid = $receiptid;
            $param_note = $note;
 	   $param_coupon = $coupon;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: submitForm.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
 			<div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>
 			
                        <div class="form-group <?php echo (!empty($city_err)) ? 'has-error' : ''; ?>">
                            <label>City Address</label>
                            <textarea name="city" class="form-control"><?php echo $city; ?></textarea>
                            <span class="help-block"><?php echo $city_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                            <label>Phone Number</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
                            <span class="help-block"><?php echo $phone_err;?></span>
                        </div>

			<div class="form-group <?php echo (!empty($amount_err)) ? 'has-error' : ''; ?>">
                            <label>Amount</label>
                            <input type="text" name="amount" class="form-control" value="<?php echo $amount; ?>">
                            <span class="help-block"><?php echo $amount_err;?></span>
                        </div>

			<div class="form-group <?php echo (!empty($receiptid_err)) ? 'has-error' : ''; ?>">
                            <label>ReceiptID</label>
                            <input type="text" name="receiptid" class="form-control" value="<?php echo $receiptid; ?>">
                            <span class="help-block"><?php echo $receiptid_err;?></span>
                        </div>
			<div class="form-group <?php echo (!empty($note_err)) ? 'has-error' : ''; ?>">
                            <label>Note</label>
                            <input type="text" name="note" class="form-control" value="<?php echo $note; ?>">
                            <span class="help-block"><?php echo $note_err;?></span>
                        </div>

				<button onclick="myFunction()">HaveCoupon</button>

						<div class="" id="myDIV">

							<input type="text" class="form-control" name="coupon" size="5" placeholder="Enter Your Coupon">
						</div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="submitForm.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>


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
</body>
</html>