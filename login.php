<?php #login.php

include('stdlib.php');
$site = new csite();
initialise_site($site);
$page = new cpage("Login");
$site->setPage($page);

if( isset($_POST['submitted'])) {
		require_once('dbc.php');
		list($check, $data) = check_login($pdo, $_POST['email'], $_POST['pass']);
		if($check) {
				#setcookie('user_id', $data['user_id'], time()+3600, '/', '', 0, 0);
				#setcookie('first_name', $data['first_name'], time()+3600, '/', '', 0, 0);
				session_start();
				$_SESSION['user_id']= $data['user_id'];
				$_SESSION['first_name'] = $data['first_name'];
				$_SESSION['email']= $data['email'];
				$url = absolute_url('loggedin.php');
				header("Location: $url");
				exit();
		}else{
			$errors=$data;
		}
}
	
if(!empty($errors)) {
		$content[] = '<h1> Error!</h1>
		<p class="error"> The following error(s) occurred:<br />
		';
		foreach($errors as $msg) {
				$content[]= "- $msg<br />\n";
		}
		$content[]= '</p><p>Please try again!</p>';
}


$content[] ='
<form action="login.php" method="post">
	<p><input type="text" name="email" placeholder="Email Address"size=20 maxlength=20 /></p>
	<p><input type="password" name="pass" placeholder="Password" size=20 maxlength=20 /></p>
	<p><input type="submit" name="submit" value="Login" /></p>
	<input type="hidden" name="submitted" value="TRUE"/>
</form>
<br>
<a href="login_process.php"><img src="googlelogo.jpg"></a>
<br>
<p>If you dont have an account, register <a href="register.php">here.</a></p>
<p>You can view/edit/delete users <a href="view_users.php">here.</a></p>
<p>Change your password - <a href="password.php">here.</a></p>
<p>Google Login<a href="login_process.php">here.</a><p>
';

$page->setContent($content);
$site->render();
?>
