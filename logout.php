<?php #logout.php

session_start();

include('stdlib.php');

$site = new csite();
initialise_site($site);
$page = new cpage("Logout");
$site->setPage($page);


if(!isset($_SESSION['user_id'])) {
    $url = absolute_url();
    header("Location: $url");
    exit();
} else {
    //setcookie('user_id', '', time()-3600, '/', '', 0,0);
    //setcookie('first_name', '', time()-3600, '/', '', 0,0);
    $_SESSION = array();
    session_destroy();
    setcookie('PHPSESSID', '', time()-3600, '/','',0,0);
}
$content[] = "<p>You are now logged out!</p>";

$page->setContent($content);
$site->render();

?>