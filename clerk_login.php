
<!DOCTYPE html>
<html>
<head>

	<title>Clerk Login Page</title>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
	<meta name='description' content='' />
	<link rel='stylesheet' type='text/css' href='css/kickstart.css' media='all' />
	<link rel='stylesheet' type='text/css' href='style.css' media='all' /> 
	<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
	<script type='text/javascript' src='js/kickstart.js'></script>
</head>
<body>
<form method = "post" action = "clerk_login.php">
<div id='container' class='grid'>
	<header>
		<div class='col_6 column'>
			<h1 align='right'><a href='index.php'><strong>AutoService</strong>ManagementSystem</a></h1>
		</div>
		
	</header>


	<div class='col_12 column'>
			<form id='login_form'>
			<fieldset>
			<legend>Welcome Clerk! Please Login.</legend>
				<p>
					<label for='employee_id'>Clerk ID:</label>
					<input id='employee_id' name='employee_id' type='text' required= 'required'/>
				</p>
				<p>
					<label for='password'>Password</label>
					<input id='password' name='password' type='password' required= 'required'/>
				</p>			
				<p>
					<input type='submit' value='Submit' />
				</p>
				</fieldset>
			</form>
		</div>
	</div>


		<div class='clearfix'></div>
		<footer>
			<p>Copyright @ASMS_Group2; CS353 - Spring 2016, Auto Service Management System, All Rights Reserved.</p>
		</footer>
</div> <!-- End Grid -->
</body>
</html>
												
<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "car";

session_start();
mysql_connect($host,$user,$pass);
mysql_select_db($db);

if(isset($_POST['employee_id'])) {
	$employee_id = $_POST['employee_id'];
	$password = $_POST['password'];

	$_SESSION['employee_id'] = $employee_id;
	$_SESSION['password'] = $password;

	$sql = "SELECT * FROM clerk WHERE employee_id = '".$employee_id."' AND password = '".$password."' LIMIT 1 ";
	$res = mysql_query($sql);
	if(mysql_num_rows($res) == 1) {
		header('Location: clerk_main.php');
	}
	else{
		echo '
		<div>
			<center><p class="warning">The user with the given Clerk ID and password does NOT exist in the system!</p></center>
		</div>
		';
	}

}
?>