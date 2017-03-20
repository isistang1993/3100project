<?php
require_once('../Connections/conn.php'); 
session_start();

if($_GET['task']=="single"){
	$shoes_id =  $_GET["shoes_id"];
	$sex =  $_GET["sex"];
	$SQL =	"SELECT shoes.name as shoes_name, b_name, category, sex.name as sex, price, size, cr_name, p_details, highlights, 'desc', terms " .
			"FROM shoes, brand, colour, sex " . 
			"WHERE shoes.b_id = brand.b_id " . 
			"AND shoes.cr_id = colour.cr_id " .
			"AND shoes.sex = sex.sex " . 
			"AND shoes.s_id = $shoes_id ";
	//echo $SQL;

	$result = $db_con->query($SQL) or die("Error");
	$row = $result->fetch_assoc();
	do{
		$rows[] = $row;
	}while ($row = $result->fetch_assoc());
	
	echo json_encode($rows);
}

//if($_POST['task']=="profile"){
	//User profile
	/*$acc_id = "";
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
	echo json_encode($rows);*/
//}
?>
