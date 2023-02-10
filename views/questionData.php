<?php
    // $questionData = $_POST['question'];

    // //database connection
    // $questionTitles = new pg_connect("host=localhost", "port=5432", "dbname=anq_development", "user=postgres", 
    // "password=issickong7");

    // if($questionTitles->connect_error){
    //     die('Connection Failed : '.$questionTitles->connect_error);
    // }else{
    //     $stmt = $questionTitle->prepare('insert into registration(question)
    //         values(?)');
        
    //     $stmt->bind_param("s", $question);
    //     $stmt->execute();
    //     echo "registration Successful"
    //     $stmt->close();
    //     $questionTitles->close();
    // }


    // $question = $_POST['question'];

    // if (!empty($question)) {
    //     $server = "host=localhost";
    //     $port = "port=5432";
    //     $username = "user=postgres";
    //     $password = "password=issickong7";
    //     $dbname = "dbname=anq_development";
        
    //     $conn_string = "$server $port $dbname $username $password" ;
        
        
    //     $conn = pg_connect($conn_string);

    //     if (pg_connect_error()) {
    //         die('Connect Error('.pg_connect_errno().')'. pg_connect_error());
    //     } else {
    //         $SELECT = "SELECT question From question_titles Where question = ? Limit 1";
    //         $INSERT = "INSERT Into question_titles (question) Values (?)";

    //         //Prepare statement
    //         $stmt = $conn->prepare($SELECT);
    //         $stmt->bind_param("s", $question);
    //         $stmt->execute();
    //         $stmt->bind_result($question);
    //         $stmt->store_result();
    //         $rnum = $stmt->num_rows;

    //         if ($rnum==0) {
    //             $stmt->close();

    //             $stmt = $conn->prepare($INSERT);
    //             $stmt->bind_param("s", $question);
    //             $stmt->execute();
    //             echo "New question inserted sucessfully";
    //         } else {
    //             echo "Someone already asked this question";
    //         };

    //         $stmt->close();
    //         $conn->close();
    //     };
    // } else {
    //     echo "A question is required";
    //     die();
    // };



?>