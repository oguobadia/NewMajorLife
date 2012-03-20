<?php if(!isset($_SESSION)){session_start();}  ?>
<?php
	//Connect to the Database
	include "dbconnect.php";
	//Recieve Login Info
	$username = $_POST['username'];
	$pw = $_POST['pw'];	
	//Check login against database
	$query= "SELECT * FROM users WHERE username = '$username' AND password = '$pw'";
	
	$result=mysql_query($query) or die (mysql_error());
	if ($row = mysql_fetch_array($result)){
		$row['username']=$username;	
		$_SESSION['username']=$username;
		echo("<h3> HERE! </h3>");
		//include("index.html");
		header( 'Location: index.html' ) ;
	}else{	
		$errorMessage="Invalid username or password.";
		//include("login2.html");
		header( 'Location: login2.html' ) ;
	}
?>

