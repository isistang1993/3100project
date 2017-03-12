<?php
//http://stackoverflow.com/questions/34579099/fatal-error-uncaught-error-call-to-undefined-function-mysql-connect

require_once('../Connections/conn.php'); 

$username=$_POST['username'];
$password=$_POST['password'];
$f_name=$_POST['f_name'];
$l_name=$_POST['l_name'];
$sex=$_POST['sex'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$type = 'U'; 			//temp
$o_type = 'sub';		//temp for officer
$d_type = 'parttime';	//temp for driver
$acc_id = 0;			//by default

//Step 1: create account data
$SQL =	"INSERT INTO account (username, password, type) " .
 		"VALUES ('$username','$password','$type');";
$db_con->query($SQL) or die(mysql_error());

//Step 2: get new account id
$SQL =	"SELECT acc_id " .
		"FROM account " .
		"WHERE username = '$username'";
$result = $db_con->query($SQL) or die(mysql_error());
$row = $result->fetch_assoc();
$acc_id = html_entity_decode(htmlentities($row['acc_id']));

//Step 3: create user,officer,driver account
$SQL = "";
switch($type){
	case "U":	$SQL =	"INSERT INTO user_account (acc_id, phone, email, sex, f_name, l_name) ";
				$SQL .= "VALUES ($acc_id, '$phone', '$email', '$sex', '$f_name', '$l_name')";
				break;
	case "O":	$SQL =	"INSERT INTO officer_account (acc_id, email, type, f_name, l_name) ";
				$SQL .= "VALUES ($acc_id, '$email', '$o_type', '$f_name', '$l_name') ";
				break;
	case "D":	$SQL =	"INSERT INTO driver_account (acc_id, phone, email, work_type, f_name, l_name) ";
				$SQL .= "VALUES ($acc_id, '$phone', '$email', '$d_type', '$f_name', '$l_name')";
				break;
}
$db_con->query($SQL) or die(mysql_error());

//Step 4: add session
$_SESSION['username'] = $username;
$_SESSION['type'] = $type;
?>
