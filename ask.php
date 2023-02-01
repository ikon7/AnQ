<?php
include("ask.html");

$server = "host=localhost";
$port = "port=5432";
$username = "user=postgres";
$password = "password=issickong7";
$dbname = "dbname=anq_development";

$conn_string = "$server $port $dbname $username $password" ;


$conn = pg_connect($conn_string);


if(isset($_POST['question'])) {
    if(!empty($_POST['question'])) {
        $question = filter_input(INPUT_POST, 'question');

        $query = "INSERT INTO question_titles(question) values('$question')";

        $run = pg_query($conn, $query) or die(pg_error());

        if($run){
            echo " Form submmited successfully";
        } else {
            echo "For, not submmited";
        }

    };
} else {
    echo "all fields required";
};



?>