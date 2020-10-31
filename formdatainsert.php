<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "demo");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['buyername']);
$phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$amount = mysqli_real_escape_string($link, $_REQUEST['amount']);
$city = mysqli_real_escape_string($link, $_REQUEST['city']);
$receiptid = mysqli_real_escape_string($link, $_REQUEST['receiptid']);
$note = mysqli_real_escape_string($link, $_REQUEST['note']);
$coupon = mysqli_real_escape_string($link, $_REQUEST['coupon']);
  
 
// Attempt insert query execution
$sql = "INSERT INTO registration (name,email,city,phone,amount,receipt_id,note,coupon) VALUES ('$name','$email','$city','$phone','$amount','$receiptid','$note','$coupon')";
if(mysqli_query($link, $sql)){
    #echo "Records added successfully";
#setcookie("Auction_Item", "Records added successfully", time()-60);
	include"Index.php";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
<link rel="stylesheet" href="css/alert.css">
<div class="alert success">
  <span class="closebtn">&times;</span>  
  <strong>Success!</strong> Records added successfully or positive action.
</div>

<script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>