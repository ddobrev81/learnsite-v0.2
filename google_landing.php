<?php
session_start();
include('stdlib.php');
include('dbc.php');
if (!empty($_GET['openid_ext1_value_firstname']) && !empty($_GET['openid_ext1_value_lastname']) && !empty($_GET['openid_ext1_value_email'])) {    
	$firstname = $_GET['openid_ext1_value_firstname']; 
	$lastname = $_GET['openid_ext1_value_lastname'];
	$email = $_GET['openid_ext1_value_email'];
	$username=$_GET['openid_ext1_value_firstname'].' '.$_GET['openid_ext1_value_lastname'];
	//$email=$_GET['openid_ext1_value_email'];
	
	//$checkUserSql="select * from google_login where email= '$email'";
	//$checkUserRes=mysql_query($checkUserSql);
	//$checkUserCount=mysql_num_rows($checkUserRes);
	$q = "SELECT user_id FROM users WHERE email= ':e'";
	$ps = $pdo->prepare($q);
	$params = array('e' => $email);
	$ps->execute($params);
	
	 if($ps->rowCount() == 0) {
		$q= "INSERT INTO users (first_name, last_name, email, registration_date) VALUES (:fn, :ln, :e, now())";
		$ps1 = $pdo->prepare($q);
		$params = array(
			'fn' => $firstname,
			'ln' => $lastname,
			'e' => $email,
			);
		$ps1->execute($params);
		
	} 
	$user_id = $ps->fetch(PDO::FETCH_ASSOC);
	$_SESSION['user_id']= $user_id;
	//$_SESSION['UEMAIL']=$_GET['openid_ext1_value_email'];
	}
$url = absolute_url();
header("Location: $url");
?>
