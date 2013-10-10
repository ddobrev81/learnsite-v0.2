<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>DDobrev's site</title>	
	<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
	<div class="wrapper">
	<div id="user" >
        <p> 
        	<?php
        	if((isset($_SESSION['user_id'])) && (!strpos($_SERVER['PHP_SELF'],'logout.php')) ) {
        		$user_fn = (string)$_SESSION['first_name'];
        		echo "Welcome, <b>$user_fn</b>"; 
        		echo '<a href="logout.php"> Logout?</a>';
        	} else {
        		echo 'You are not logged in!';
        		echo '<a href="login.php"> Login?</a>';
        	}
        	?>
        </p>
    </div>
	<div id="header">
		<h1>DDOBREV</h1>
		<h2>The first steps...</h2>
	</div>
	<div id="navigation">
		<ul>
<li><a href="index.php">Home
 Page</a></li>
<li><a
 href="quotes.php">Quote-o-matic</a></li>
<li><a href="under_construction.php">Blog</a></li>
<li><a href="shoutbox.php">Shoutbox</a></li>
<li>
<?php
if((isset($_SESSION['user_id'])) && (!strpos($_SERVER['PHP_SELF'],'logout.php')) ) {
    echo '<a href="logout.php">Logout</a>';
} else {
    echo '<a href="login.php">Login</a>';
}
?>
</li>
			
		</ul>
	</div>
	<div id="content">
		
