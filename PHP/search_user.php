<?php
require_once('../Connections/conn.php'); 
session_start();

$SQL = "";
if(isset($_SESSION['username'])){
	//User profile
	$acc_id = "";
	$f_name = "";
	$l_name = "";
	$sex ="";
	$phone = "";
	$email = "";
	
	$SQL = 	"SELECT acc_id " .
			"FROM account " .
			"WHERE username = '$_SESSION[username]'";
	//echo "$SQL";
	$result = $db_con->query($SQL) or die("Error");
	$row = $result->fetch_assoc();
	$acc_id = html_entity_decode(htmlentities($row['acc_id']));
	$result->free();

	switch($_SESSION['type']){
		case 'U':
			$SQL =	"SELECT f_name, l_name, sex, phone, email " .
					"FROM user_account " .
					"WHERE acc_id = $acc_id";
			break;
		case 'nor':
		case 'sup':
			$SQL =	"SELECT f_name, l_name, type, email " .
					"FROM officer_account " .
					"WHERE acc_id = $acc_id";
			break;
		case 'FT':
		case 'PT':
			$SQL =	"SELECT f_name, l_name, work_type, email, phone " .
					"FROM driver_account " .
					"WHERE acc_id = $acc_id";
			break;
	}
	
	//echo "$SQL ";
	$result = $db_con->query($SQL) or die("Error");
	$row = $result->fetch_assoc();
	$rows = array();
	do{
		$rows[] = $row;
	}while ($row = $result->fetch_assoc());
	echo json_encode($rows);
}else{
	//Check login
}
?>
