<?php #index.php
session_start();
include 'stdlib.php';

$site = new csite();

initialise_site($site);

$page = new cpage("Under Contruction!");
$site->setPage($page);

$content[] ='<br>Under Contruction! Coming Soon™';

$page->setContent($content);

$site->render();

?>