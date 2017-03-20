<?php
require_once('../Connections/conn.php');
session_start();
if($_POST['task']=="profile"){
	//Step1: get acc_od
	$SQL = 	"SELECT acc_id " .
			"FROM account " .
			"WHERE username = '$_SESSION[username]'";
	$result = $db_con->query($SQL) or die("Error");
	$row = $result->fetch_assoc();
	$acc_id = html_entity_decode(htmlentities($row['acc_id']));

	//Step2: update information
	$f_name = $_POST['f_name'];
	$l_name = $_POST['l_name'];
	$sex = $_POST['sex'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$work_type = $_POST['work_type'];
	$job_type = $_POST['job_type'];
	$new_password = $_POST['new_password'];

	$type = $_SESSION['type'];
	$username = $_SESSION['username'];

	$SQL = "";
	switch($type){
		case "U":	$SQL = "UPDATE user_account ";
					$SQL.= "SET phone='$phone', email='$email', sex='$sex', f_name='$f_name', l_name='$l_name' ";
					$SQL.= "WHERE acc_id=$acc_id";
					break;
		case "sup":
		case "nor":	$SQL = "UPDATE officer_account ";
					$SQL.= "SET email='$email', type='$job_type', f_name='$f_name', l_name='$l_name' ";
					$SQL.= "WHERE acc_id=$acc_id";
					break;
		case "FT":
		case "PT":	$SQL = "UPDATE driver_account ";
					$SQL.= "SET phone='$phone', email='$email', work_type='$work_type', f_name='$f_name', l_name='$l_name' ";
					$SQL.= "WHERE acc_id=$acc_id";
					break;
	}
	echo $SQL;
	$db_con->query($SQL) or die("Error");

	//Step3: update password
	if($new_password != ""){
		$SQL = "UPDATE account ";
		$SQL.= "SET password='$new_password' ";
		$SQL.= "WHERE acc_id=$acc_id";
	}
	//echo $SQL;
	$db_con->query($SQL) or die("Error");

	//Step4: set new session
	switch($type){
		case "U":	$type="U";
					break;
		case "sup":
		case "nor":	$type=$job_type;
					break;
		case "FT":
		case "PT":	$type=$work_type;
					break;
	}
	$_SESSION['username'] = $username;
	$_SESSION['type'] = $type;
}else if($_POST['task']=="session"){
  $SQL = "SELECT type
	from account
	where username ='$_POST['username']'
	and password='$_POST['password']'";
	$result = $db_con->query($SQL) or die(mysql_error());
	$row = $result->fetch_assoc();
	$type = html_entity_decode(htmlentities($row['type']));

	$_SESSION['username'] = $_POST['username'];
	$_SESSION['type'] = $type;

}
?>
