<?php 
$db_host="localhost:3306";
$db_username="root";
$db_pass="";
$db_name="giaythethao";

$mysqli = new mysqli("$db_host", "$db_username", "$db_pass", "$db_name");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>