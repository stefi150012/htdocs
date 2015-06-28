<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body>

<?php 
   //check if the form was submitted or if this page was loaded 
   if(isset($_POST['submit']) && $_POST['submit'] == 'register'){ 
   //get the variables from the submitted form 
      $first_name = stripslashes($_POST['first_name']); 
      $last_name = stripslashes($_POST['last_name']); 
      $email = stripslashes($_POST['email']); 
      $username = stripslashes($_POST['username']); 
      $password = stripslashes($_POST['password']); 
if(($first_name == '') || ($last_name == '') || ($email == '') || ($username == '') || ($password == '') || (!isset($first_name)) || (!isset($last_name)) || (!isset($email)) || (!isset($username)) || (!isset($password))){ 
echo "You forgot the following required fields:'<br />'. '<ul>'";
 
if(($first_name == '') || (!isset($first_name))){ 
echo "<li>FIRST NAME</li>"; 
} 
if(($last_name == '') || (!isset($last_name))){ 
echo "<li>LAST NAME</li>"; 
} 
if(($email == '') || (!isset($email))){ 
echo "<li>EMAIL ADDRESS</li>"; 
} 
if(($username == '') || (!isset($username))){ 
echo "<li>USERNAME</li>"; 
} 
if(($password == '') || (!isset($password))){ 
echo "<li>PASSWORD</li>"; 
} 
echo "</ul><br />
Please fill in these values and submit the form again.<br />";

echo "<form name='registration_form' action = '$_PHPSELF' method = 'post' id='registration_form'> 

<label for='first_name'>*FIRST NAME:</label><br /> 

<input name='first_name' type='text' id='first_name' size='25' maxsize='25' value = " . $first_name . " /><br /> 

<label for='last_name'>*LAST NAME:</label><br /> 

<input name='last_name' type='text' id='last_name' size='25' maxsize='25' value=" . $last_name . " /><br /> 

<label for='email'>*EMAIL ADDRESS:</label><br /> 

<input name='email' type='text' id='email' size='45' maxsize='100' value=" . $email . " /><br /> 

<label for='username'>*USERNAME:</label><br /> 

<input name='username' type='text' id='username' size='25' maxsize='25' value=" . $username . " /><br /> 

<label for='password'>*PASSWORD:</label><br /> 
<input name='password' type='password' id='password' size='25' maxsize='25' value=" . $password . " /><br /> 

<input name='register' type='submit' id='register' value='REGISTER' /> 
</form>"; 
function is_valid_email($address) { 
return (eregi( 
'^[-!#$%&\'*+\./0-9=?A-Z^_`{|}~]+'.      // the user name 
'@'.                                     // the ubiquitous at-sign 
'([-0-9A-Z]+.)+' .               // host, sub-, and domain names 
'([0-9A-Z]){2,4}$',            // top-level domain (TLD) 
trim($address))); 
} 
$f_email = strtolower(trim($email)); 
if (is_valid_email($f_email)) { 
$user = 'root'; 
$pass = '0048156529Aa'; 
$host = 'localhost'; 
$dbname = 'login_register'; 

$dbconn = mysql_connect($host, $user, $pass) or die('Could not connect to database server'); 
$db = mysql_select_database($dbname, $dbconn) or die('Could not select database'); 
if($db){ 
$username_query = 'SELECT username FROM members WHERE username = $username'; 

$email_query = 'SELECT email FROM members WHERE email = $email'; 

$user_check = mysql_query($username_query); 

$email_check = mysql_query($email_query); 

$user_rows = mysql_num_rows($user_check); 

$email_rows = mysql_num_rows($email_check); }

if(($user_rows >=1) || ($email_rows >=1)){ 
echo "<p>You have made a duplicate entry.<br />";} 
if($user_rows >=1){ 
echo "The USERNAME: $username is already in our database.<br />"; 
unset($username); 
} 
if($email_rows>=1){ 
echo "The EMAIL ADDRESS: $email is already in our database."; 
unset($email); 
} 
echo "Please make these corrections and submit the form again.</p>"; 
 
echo "<form name='registration_form' action = '$_PHPSELF' method ='post' id='registration_form'> 

<label for='first_name'>*FIRST NAME:</label><br /> 

<input name='first_name' type='text' id='first_name' size='25' maxsize='25' value = " . $first_name . " /> 
<br /> 

<label for='last_name'>*LAST NAME:</label><br /> 

<input name='last_name' type='text' id='last_name' size='25' maxsize='25' value=" . $last_name . " /> 
<br /> 

<label for='email'>*EMAIL ADDRESS:</label><br /> 

<input name='email' type='text' id='email' size='45' maxsize='100' value=" . $email . " /><br /> 

<label for='username'>*USERNAME:</label><br /> 

<input name='username' type='text' id='username' size='25' maxsize='25' value=" . $username . " /><br /> 

<label for='password'>*PASSWORD:</label><br /> 
<input name='password' type='password' id='password' size='25' maxsize='25' value=" . $password . " /><br /> 

<input name='register' type='submit' id='register' value='REGISTER' /> 
</form>"; 
      } else { 
$dbpass = md5($password); 
$sql = 'INSERT INTO members (first_name, last_name, email, username, password) 
VALUES ($first_name, $last_name, $email, $username, $dbpass)'; 
mysql_query($sql); 
            mysql_close(); 
$to = $email; 
$from = ' nX-Mailer: PHP/' . phpversion; 
$subject = "Your account information at HackTuesexample.com"; 
$message = "You recently registered with HackTuesexample.com.  Here is your log in information: 

Username: $username 
Password: $password 
Once you activate your account through the link below you will be able to login to your account. 

Click the link to activate: 
http://www.HackTuesexample.com.net/activate.php?id=$user_id&code=$db_password 

Thank you 
The Webmaster 

This is an automated response PLEASE DO NOT REPLY"; 
mail($to, $subject, $message, $from); 
echo "<p>Registration completed. Please check your email to activate your account.<br /> 
You will not be able to login to your account until it has been activated.</p>"; 
         } 
} else { 
//display the form for registration 
echo "<form name='registration_form' action = '$_PHPSELF' method = 'post' id='registration_form'> 

<label for='first_name'>*FIRST NAME:</label><br /> 

<input name='first_name' type='text' id='first_name' size='25' maxsize='25'/><br /> 

<label for='last_name'>*LAST NAME:</label><br /> 

<input name='last_name' type='text' id='last_name' size='25' maxsize='25' /><br /> 

<label for='email'>*EMAIL ADDRESS:</label><br /> 

<input name='email' type='text' id='email' size='45' maxsize='100' /><br /> 

<label for='username'>*USERNAME:</label><br /> 

<input name='username' type='text' id='username' size='25' maxsize='25' /><br /> 

<label for='password'>*PASSWORD:</label><br /> 

<input name='password' type='password' id='password' size='25' maxsize='25' /><br /> 

<input name='register' type='submit' id='register' value='REGISTER' /> 
</form>"; 
   }} else { ?>
   
<!DOCTYPE html>
<html>
<body>
	<form name="registration_form" action = "HackTUES.html" method = "post" id="registration_form">
	<label for="first_name">*FIRST NAME:</label><br /> 
   <input name="first_name" type="text" id="first_name" size="25" maxsize="25"/><br /> 
   <label for="last_name">*LAST NAME:</label><br /> 
   <input name="last_name" type="text" id="last_name" size="25" maxsize="25" /><br /> 
   <label for="email">*EMAIL ADDRESS:</label><br /> 
   <input name='email' type='text' id='email' size='45' maxsize='100' /><br /> 
   <label for='username'>*USERNAME:</label><br /> 
   <input name='username' type='text' id='username' size='25' maxsize='25' /><br /> 
   <label for='password'>*PASSWORD:</label><br /> 
   <input name='password' type='password' id='password' size='25' maxsize='25' /><br /> 
	<button type="button class="btn btn-primary">Login</button>
	
</form> 
</body>
</html>
<?php 
   }
   $insert=mysql_query("INSERT INTO members(first_name,last_name,email,username,password) VALUES=('Stanislav','Angelov',stet@abv.bg,'123AB')");
?>
</body>