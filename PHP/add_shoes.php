<?php
require_once('../Connections/conn.php'); 
session_start();

if((isset($_POST['task']) && $_POST['task']=="rank") || (isset($task) && $task == "rank")){

	if(isset($_SESSION['username'])){
		$username = $_SESSION['username'];
		$SQL =	"SELECT acc_id " .
		"FROM account " .
		"WHERE username = '$username'";
		$result = $db_con->query($SQL) or die(mysql_error());
		$row = $result->fetch_assoc();
		$acc_id = html_entity_decode(htmlentities($row['acc_id']));


		$shoes_id = $_POST['shoes_id'];
		$rank_num = $_POST['rank_num'];
		$SQL =	"INSERT INTO rank (shoes_id, rank, acc_id)" . 
				"VALUES ($shoes_id, $rank_num, $acc_id)";
		$db_con->query($SQL) or die("Error");
		echo "Added";
	}else{
		echo "Login";
	}
}
?>