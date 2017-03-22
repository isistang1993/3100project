<?php
require_once('../Connections/conn.php');
session_start();

if(isset($_POST['task']) && $_POST['task']=="profile"){
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
}else if(isset($_POST['task']) && $_POST['task']=="session"){
  $SQL = "SELECT type
	FROM account
	WHERE username ='$_POST[username]'
	AND password='$_POST[password]'";
	echo $SQL;
	$result = $db_con->query($SQL) or die("Error");
	$row = $result->fetch_assoc();
	$type = html_entity_decode(htmlentities($row['type']));
 echo $type;
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['type'] = $type;
}else if(isset($_POST['task']) && $_POST['task']=="pw"){
	//Step1: get random PW
	$new_pw = "";
	$seed = str_split('abcdefghijklmnopqrstuvwxyz'
	                 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
	                 .'0123456789!@#$%^&*()'); // and any other characters
	shuffle($seed); // probably optional since array_is randomized; this may be redundant
	foreach (array_rand($seed, 8) as $k) $new_pw .= $seed[$k];

	//Step2: update pw
	$table = ["driver_account", "officer_account", "user_account"];
	for($i=0; $i<sizeof($table); $i++){
		$SQL =	"SELECT 1 " .
			"FROM $table[$i] " .
			"WHERE email = '$_POST[email]'";
		$result = 	$db_con->query($SQL) or die("Error");
		$row = $result->fetch_assoc();
		
		if(($result->num_rows)!=0){
			$SQL =	"UPDATE account " . 
					"INNER JOIN officer_account ON " .
					"	 account.acc_id = officer_account.acc_id " .
					"SET account.password = '$new_pw' " .
					"WHERE officer_account.email = '$_POST[email]'";
			$db_con->query($SQL) or die("Error");

			//Step3: send email
			$to = $_POST['email'];
			$title = "Change password!!!";
			$message = "password = $new_pw";
			mail($to, $title, $message);
			break; 
		}
	}

}
?>
