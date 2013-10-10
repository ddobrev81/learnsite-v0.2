<?php #quotes.php

session_start();

include('stdlib.php');

$site = new csite();
initialise_site($site);
$page = new cpage("Quote-o-matic");
$site->setPage($page);

include('dbc.php');
$q = "SELECT text FROM quotes ORDER BY RAND() LIMIT 1";
$ps = $pdo->prepare($q);
$ps->execute();
$quote = $ps->fetch(PDO::FETCH_NUM);

$content[] = "<p><textarea readonly> $quote[0] </textarea></p>";
$content[] = '<p><a href="quotes.php"> Next </a></p>';

$content[] = '
<p><a href="create_quote.php">Create a new quote!</p>
';

$page->setContent($content);
$site->render();

?>