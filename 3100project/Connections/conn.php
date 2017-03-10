<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conn = "127.0.0.1";
$database_conn = "3100db";
$username_conn = "root";
$password_conn = "";
$db_con = mysqli_connect($hostname_conn, $username_conn, $password_conn, $database_conn) or trigger_error(mysql_error(),E_USER_ERROR);
?>
