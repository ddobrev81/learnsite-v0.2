<?php #quotes.php

session_start();

include('stdlib.php');

$site = new csite();
initialise_site($site);
$page = new cpage("Quote-o-matic");
$site->setPage($page);

if(isset($_POST['submitted'])) {
	if(empty($_POST['quote'])) {
		$content[] = "You did not submit any quotes!\n";
	}else{
		$quote = trim($_POST['quote']);
	}
	if(empty($_SESSION['user_id'])) {
		$content[] = "<p>You are not logged in. Only logged in users can create quotes!</p><br>";
	}else{
		$user_id = $_SESSION['user_id'];
	}
	
	if(empty($content)) {
		include('dbc.php');
		$q = "INSERT INTO quotes (user_id, text, creation_date) VALUES (:uid, :t, NOW())";
		$ps = $pdo->prepare($q);
		$params = array('uid' => $user_id, 't' => $quote);
		$r = $ps->execute($params);
		if($r) {
			$content[] = '<h1>Quote added to database, thx!</h1><br>';
		}else{
			$content[] = '<h1>Ooops something went wrong!<br></h1>';
		}

	}
	//else{
	//	$content[] = "<p>Please try again!</p>";
	//}	
}

$content[] = '
<br>
<form action="create_quote.php" method="post">
<textarea name="quote" placeholder="Insert your quote here, max 500 characters:" style="width:450px;height:150px;"></textarea></p>
<p><input type="submit" name="submit" value="Submit" /></p>
<input type="hidden" name="submitted" value="TRUE" />
';

$page->setContent($content);
$site->render();

?>