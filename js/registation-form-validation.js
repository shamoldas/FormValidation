function formValidation()
{


var uname = document.registration.buyername;
var uemail = document.registration.email;
var ucity = document.registration.city;
var uphone = document.registration.phone;
var uamount = document.registration.amount;
var ureceiptid = document.registration.receiptid;
var unote = document.registration.note;




if(allLetter(uname))
{
if(alphanumeric(ucity))
{ 
if(phonenumber(uphone))
{
if(userreceipt(ureceiptid))
{
if(ValidateEmail(uemail))
{
if(useramount(uamount,1,10))
{
}
} 
}
} 
}
}

return false;

} 
/*
function userid_validation(uid,mx,my)
{
var uid_len = uid.value.length;
if (uid_len == 0 || uid_len >= my || uid_len < mx)
{
alert("User Id should not be empty / length be between "+mx+" to "+my);
uid.focus();
return false;
}
return true;
}

function passid_validation(passid,mx,my)
{
var passid_len = passid.value.length;
if (passid_len == 0 ||passid_len >= my || passid_len < mx)
{
alert("Password should not be empty / length be between "+mx+" to "+my);
passid.focus();
return false;
}
return true;
}
*/

function allLetter(uname)
{ 
var letters = /^[A-Za-z]+$/;
if(uname.value.match(letters))
{
return true;
}
else
{
alert('Your Name must have alphabet characters only');
uname.focus();
return false;
}
}


function ValidateEmail(uemail)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(uemail.value.match(mailformat))
{
return true;
}
else
{
alert("You have entered an invalid email address!");
uemail.focus();
return false;
}
}


function alphanumeric(ucity)
{ 
var letters = /^[0-9a-zA-Z]+$/;
if(ucity.value.match(letters))
{
return true;
}
else
{
alert('User address must have alphanumeric characters only');
ucity.focus();
return false;
}
}



function phonenumber(uphone)
{
  var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
  if(uphone.value.match(phoneno))
     {
	   return true;
	 }
   else
     {
	   alert("Not a valid Phone Number");
	   return false;
     }
}

/*
function useramount(uamount)
{
  var totalamount = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
  if(uamount.value.match(totalamount))
     {
	   return true;
	 }
   else
     {
	   alert("Not a valid amount Number");
	   return false;
     }
}
*/

function useramount(uamount,mx,my)
{
var uamount_len = uamount.value.length;
if (uamount_len == 0 || uamount_len >= my || uamount_len < mx)
{
alert("Amount should not be empty / length be between "+mx+" to "+my);
uid.focus();
return false;
}
return true;
}


function userreceipt(ureceiptid)
{ 
var letters = /^[0-9a-zA-Z]+$/;
if(ureceiptid.value.match(letters))
{
return true;
}
else
{
alert('Receipt iD must have alphanumeric characters only');
ureceiptid.focus();
return false;
}
}

function usernote(unote)
{ 
var letters = /^[0-9a-zA-Z]+$/;
if(unote.value.match(letters))
{
return true;
}
else
{
alert('Note must have alphanumeric characters only');
unote.focus();
return false;
}
}

function countryselect(ucountry)
{
if(ucountry.value == "Default")
{
alert('Select your country from the list');
ucountry.focus();
return false;
}
else
{
return true;
}
}


function allnumeric(uzip)
{ 
var numbers = /^[0-9]+$/;
if(uzip.value.match(numbers))
{
return true;
}
else
{
alert('ZIP code must have numeric characters only');
uzip.focus();
return false;
}
}


