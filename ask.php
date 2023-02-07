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
            echo " Question submmited successfully";
        } else {
            echo "An error occured";
        }

    };
} else {
    echo "Question required";
};



$sql = "SELECT title from tag_titles";
$result = pg_query($conn, $sql) or die(pg_error());

if (pg_num_rows($result) > 0) {
    while ($row = pg_fetch_assoc($result)) {
        //maybe try putting html into this spot right here?
        foreach($row as $x){
            echo "Key= ". $row["title"];
            echo "<br>";
        }
    }
    //this might be wrong
    echo "</table>";
} else {
    echo "0 result";
}


?>