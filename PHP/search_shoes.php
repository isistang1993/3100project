<?php
require_once('../Connections/conn.php'); 
//session_start();


if((isset($_GET['task']) && $_GET['task']=="single") || (isset($task) && $task == "single")){
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

	$shoes_name = html_entity_decode(htmlentities($row['shoes_name']));
	
	do{
		$rows[] = $row;
	}while ($row = $result->fetch_assoc());
	echo json_encode($rows);

}else if((isset($_GET['task']) && $_GET['task']=="shoes_name") || (isset($task) && $task == "shoes_name")){
	$shoes_id =  $_GET["shoes_id"];
	$sex =  $_GET["sex"];
	$SQL =	"SELECT shoes.name as shoes_name " .
			"FROM shoes " . 
			"WHERE shoes.s_id = $shoes_id ";
	//echo $SQL;

	$result = $db_con->query($SQL) or die("Error");
	$row = $result->fetch_assoc();

	$shoes_name = html_entity_decode(htmlentities($row['shoes_name']));

}else if((isset($_GET['task']) && $_GET['task']=="quick_view") || (isset($task) && $task == "quick_view")){
	if(isset($_GET['sex'])){
		$sex = $_GET['sex'];
	}
	$SQL =	"SELECT s_id, sex, shoes.name, price, FLOOR(RAND() * 100) + 0 AS random_number " . 
			"FROM shoes " . 
			"WHERE 1 = 1 ";
	//condition
	if(isset($sex))
	$SQL.=	"AND sex = '$sex' " ;
	$SQL.=	"order by random_number";
	//echo $SQL;
	$result = $db_con->query($SQL) or die("Error");
	$row = $result->fetch_assoc();
	do{
		$rows[] = $row;
	}while ($row = $result->fetch_assoc());

	//show other not related shoes
	$SQL =	"SELECT s_id, sex, shoes.name, price, FLOOR(RAND() * 100) + 0 AS random_number " . 
			"FROM shoes " ;
	$SQL.=	"ORDER BY random_number" ;
	$result = $db_con->query($SQL) or die("Error");
	$row = $result->fetch_assoc();
	do{
		$rows[] = $row;
	}while ($row = $result->fetch_assoc());
	echo json_encode($rows);
}
?>

