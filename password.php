<?php #password.php

include('stdlib.php');
$site = new csite();
initialise_site($site);

$page = new cpage("Change Your Password");
$site->setPage($page);


if( isset($_POST['submitted'])) {
	if( empty($_POST['email'])) {
		$content[]='You did not enter your email address';
	} else {
		$e = trim($_POST['email']);
	}
	if(empty($_POST['pass'])) {
		$content[]='You did not enter a password!';
	} else {
		$p = trim($_POST['pass']);
	}
	if(!empty($_POST['pass1'])) {
		if($_POST['pass1'] != $_POST['pass2']) {
			$content[]='Your new passwords doesnt match!';
		} else {
			$np = trim($_POST['pass1']);
		}
	} else {
		$content[]='You didnt enter a password!';
	}
	include ('dbc.php');
	if (empty($errors)) { 
		$q = "SELECT user_id FROM users WHERE (email=:e AND pass=SHA1(:p))";
		$ps = $pdo->prepare($q);
		$params = array ('e' => $e, 'p' => $p);
		$ps->execute($params);
		if ($ps->rowCount() == 1) { // Match was made.
			$row = $ps->fetch(PDO::FETCH_NUM);
			// Make the UPDATE query:
			$id = $row[0];
			$q = "UPDATE users SET pass=SHA1(:np) WHERE user_id=:id";		
			$ps = $pdo->prepare($q);
			$params = array ('np' => $np, 'id' => $id);
			$ps->execute($params);
			if ($ps->rowCount() == 1) { // If it ran OK.
				$content[] = '<h1>Thank you!</h1>
				<p>Your password has been updated.</p><p><br /></p>';	
			} else { 
				// Public message:
				$content[] = '<h1>System Error</h1>
				<p class="error">Your password could not be changed due to a system error. We apologize for any inconvenience.</p>'; 
			}
		}
	}
}
$content[] = <<<HTML
<form action="password.php" method="post">
<p><input type="text" name="email" size="30" placeholder="Email Address" maxlength="80" /> </p>
<p><input type="password" name="pass" size="30" placeholder="Current Password" maxlength="20" /></p>
<p><input type="password" name="pass1" size="30" placeholder="New Password" maxlength="20" /></p>
<p><input type="password" name="pass2" size="30" placeholder="Confirm New Password"" maxlength="20" /></p>
<p><input type="submit" name="submit" value="Change Password" /></p>
<input type="hidden" name="submitted" value="TRUE" />
</form>
HTML;

$page->setContent($content);
$site->render();

?>