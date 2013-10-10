<?php #loggedin.php
session_start();
include('stdlib.php');

if(!isset($_SESSION['user_id']))
	{
		$url = absolute_url();
		header("Location: $url");
		exit();
	}

$site = new csite();
initialise_site($site);
$page = new cpage("Logged In!");
$site->setPage($page);

$content[] = "
		<p>You are now logged in, {$_SESSION['first_name']}!</p>
		<p><a href=\"logout.php\">Logout</a></p>
		";

$page->setContent($content);
$site-> render();

?>
