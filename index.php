<?php #index.php
session_start();
include 'stdlib.php';

$site = new csite();

initialise_site($site);

$page = new cpage("Welcome");
$site->setPage($page);

$content[] ='<p>The code for this site can be found <a href="https://github.com/ddobrev81/learnsite">here.</a></p>
<p>Check out that <a href="http://ddod.host22.com/fancytext">FancyText</a> plug-in!</p>
<p>Its <a href="http://ddod.host22.com/supersizesite">SuperSized</a></p>
';

$page->setContent($content);

$site->render();

?>