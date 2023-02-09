<?php
include('../config/db_connect.php');
//For question input form
//Code below to put question data into database is working currently. It did not work recently for some odd reason.
if(isset($_POST['question'])) {
    if(!empty($_POST['question'])) {
        $question = filter_input(INPUT_POST, 'question');

        $query = "INSERT INTO question_titles(question) values('$question')";

        $run = pg_query($conn, $query);

        if($run){
            echo " Question submmited successfully";
        } else {
            echo "An error occured";
        }

    };
} else {
    echo "Question required";
};



//For getting data from Tag Database
$sql = "SELECT id, title from tag_titles";
$result = pg_query($conn, $sql);

$tags = pg_fetch_all($result, PGSQL_ASSOC);

//Getting Tag ID
$tagIdFuntion = function() {

}


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

              <?php foreach($tags as $tag) { 
                $tagValue = htmlspecialchars($tag['title']); 
                
                ?>

                <input type="checkbox" id="<?php echo $tagValue ?>" name="<?php echo $tagValue ?>" value="<?php echo $tagValue ?>">
                <label for="science"> <?php echo $tagValue ?> </label><br>

              <?php } ?>

              <input type="submit" value="Submit"></input>
            </div>
          </div>
        </form>
      </div>
  </center>
</html>