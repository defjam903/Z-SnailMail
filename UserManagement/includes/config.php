<?php
ob_start();
session_start();

//set timezone
date_default_timezone_set('Europe/London');

//database credentials
define('DBHOST','joneschris.com');
define('DBUSER','zilla');
define('DBPASS','3490d32!');
define('DBNAME','cjones12_Zilla');

//application address
define('DIR','http://joneschris.com/Zilla/');
define('SITEEMAIL','noreply@ZSM.com');

try {

	//create PDO connection
	$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}

//include the user class, pass in the database connection
include('classes/user.php');
include('classes/phpmailer/mail.php');
$user = new User($db);
?>
