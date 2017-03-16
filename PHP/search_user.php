<?php
require_once('../Connections/conn.php'); 

$SQL = "";
if(isset($_SESSION['username']){
	//User profile
	$acc_id = "";
	$f_name = "";
	$l_name = "";
	$sex ="";
	$phone = "";
	$email = "";
	
	$SQL = 	"SELECT acc_id " .
			"FROM account " .
			"WHERE username = $_SESSION[username]";

	$db_con->query($SQL) or die(mysql_error());
	$row = $result->fetch_assoc();
	$acc_id = html_entity_decode(htmlentities($row['acc_id']));

	switch($_SESSION['type']){
		case 'U':
			$SQL =	"SELECT f_name, l_name, sex, phone, email" .
					"FROM user" .
					"WHERE acc_id = $acc_id";
			$db_con->query($SQL) or die(mysql_error());
			$row = $result->fetch_assoc();
			$f_name = html_entity_decode(htmlentities($row['f_name']));
			$l_name = html_entity_decode(htmlentities($row['l_name']));
			$sex = html_entity_decode(htmlentities($row['sex']));
			$phone = html_entity_decode(htmlentities($row['phone']));
			$email = html_entity_decode(htmlentities($row['email']));
			break;

		case 'nor':
		case 'sup':
			
			break;
		
		case 'FT':
		case 'PT':
			break;
	}

	$SQL = 'SELECT ';
}else{
	//Check login
	session_start();
}
?>
