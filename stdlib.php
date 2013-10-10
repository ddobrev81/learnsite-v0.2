<?php #stdlib.php


include 'csite.php';
include 'cpage.php';

function initialise_site(csite $site) {
	$site->addHeader("header.php");
	$site->addFooter("footer.php");
}

function absolute_url($urlpage='index.php')
{
		$url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
		$url = rtrim($url, '/\\');
		$url .='/'.$urlpage;
		return $url;
}

function check_login($pdo, $email='', $pass='')
{
		if(empty($email)) {
			$errors = array();
			$errors[]='You forgot to enter your email address!';
		}else{
			$e = trim($email);
		}
		if(empty($pass))			{
			$errors[]='You forgot to enter your password!';
		}else{
			$p = trim($pass);
		}
		if(empty($errors))	{
				$q = "SELECT user_id, first_name, email FROM users WHERE email=:e AND pass=SHA1(:p)";
				$ps = $pdo->prepare($q);
				$params = array('e' => $e , 'p' => $p);
				$ps->execute($params);
				if($ps->rowCount() == 1){
						$row = $ps->fetch(PDO::FETCH_ASSOC);
						return array(true, $row);
				}else{
						$errors[] = 'The email address and password entered do not match!';
				}
		}
		return array(false,$errors);
}

?>