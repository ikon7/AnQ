<?php 

$server = "host=localhost";
$port = "port=5432";
$username = "user=postgres";
$password = "password=issickong7";
$dbname = "dbname=anq_development";

$conn_string = "$server $port $dbname $username $password" ;


$conn = pg_connect($conn_string);

?>