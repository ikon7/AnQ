<?php
include('../config/db_connect.php');
//Currently trying to find a good spot to insert both tagid and questionid into the question_tag table. Most likely going to 
//try inside of the tag foreach loop.



//For question input form
//Code below to put question data into database is working currently. It did not work recently for some odd reason.
$question = filter_input(INPUT_POST, 'question');
if(isset($_POST['question'])) {
    if(!empty($_POST['question'])) {
        // $question = filter_input(INPUT_POST, 'question');
        

        $query = "INSERT INTO question_titles(question) values('$question')";

        $run = pg_query($conn, $query);

        

        // if($run){
        //     echo " Question submmited successfully";
        // } else {
        //     echo "An error occured";
        // }

        // $questionIdSelect = "SELECT id from question_titles WHERE question = '$question'";
        // $questionIdResult = pg_query($conn, $questionIdSelect);
        // $questionId = pg_fetch_all($questionIdResult, PGSQL_ASSOC);

        // foreach($questionId as $bId) {
        //   $vbId = $bId['id'];
          
        //   $qtId = "INSERT INTO question_tag(questionid) VALUES ('$vbId')";

        //   $qtIdRun = pg_query($conn, $qtId);

        //   if($qtId) {
        //     echo "Yay";
        //   } else {
        //     echo "pain peko";
        //   }
        // }
        // print_r($questionId);

    };
};

$questionIdSelect = "SELECT id from question_titles WHERE question = '$question'";
$questionIdResult = pg_query($conn, $questionIdSelect);
$questionId = pg_fetch_all($questionIdResult, PGSQL_ASSOC);




//For getting data from Tag Database
$sql = "SELECT id, title from tag_titles";
$result = pg_query($conn, $sql);

$tags = pg_fetch_all($result, PGSQL_ASSOC);


// Useful for question display page
// $questionTagIdSelect = "SELECT id from question_tag WHERE questionid = 106";
// $questionTagIdResult = pg_query($conn, $questionTagIdSelect);
// $tetResult = pg_fetch_all($questionTagIdResult, PGSQL_ASSOC);


// foreach($tetResult as $tResult) {
//   $aResult = $tResult['id'];
//   echo $aResult;
// }
// echo gettype($tetResult);



?>

<html>
  <head>
    <title> AnQ</title>
    <link type="text/css" href="homepageStyles.css"/>
    <link type=""
  </head>
  <body></body>
  <center>
    <h1>AnQ
    </h1>
      <div class="search">
        <input type="text" id="searchValue" placeholder="Search.."/>
      </div>
      <div class="container">
        <div class="vertical-center">
            <div class="topnav"> <a class="active" href="/">Home</a><a href="tag.php">Tags </a><a href="ask.php">Ask </a><a href="question.php">Questions</a></div>
        </div>
      </div>
      <div class="question-form">
        <form action="./ask.php" method="POST">
          <div> 
            <h2>Question </h2>
          </div>
          <div> 
            <input type="text" id="questionData" name="question" placeholder="Type here.." autocomplete="off" required="required"/>
            <div>

              <?php 
              //Or maybe declare empty array here? 1st
              $arr = [];

              foreach($tags as $tag) { 
                //To display tags on webpage
                $tagValue = htmlspecialchars($tag['title']);
                
                //Used to grab id values in later code
                $tagIdValue = $tag['id'];




                $questionIdSelect = "SELECT id from question_titles WHERE question = '$question'";
                $questionIdResult = pg_query($conn, $questionIdSelect);
                $questionId = pg_fetch_all($questionIdResult, PGSQL_ASSOC);


                // check it $tagValue is checked
                if (isset($_POST["$tagValue"])) {
                  

                  // Input questionId and tagId at the same time
                  foreach($questionId as $bId) {

                    $vbId = htmlspecialchars($bId['id']);
                  

                    //tagIdValue goes into here after vbId
                    $questiontagIdQuery = "INSERT INTO question_tag(questionid, tagid) VALUES ('$vbId', '$tagIdValue')";

                    $run = pg_query($conn, $questiontagIdQuery);
                    
                  }
                }
                ?>

                <input type="checkbox" id="<?php echo $tagValue ?>" name="<?php echo $tagValue ?>" value="<?php echo $tagValue ?>">
                <label for="<?php echo $tagValue ?>"> <?php echo $tagValue ?> </label><br>

              <?php } ?>
              
                
              <input type="submit" value="Submit"></input>
            </div>
          </div>
        </form>
      </div>
  </center>
</html>