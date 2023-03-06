<?php
include('../config/db_connect.php');

//obtain question_title data and question_tag data 
//question_title data should be the titles column
$questionTitleSelect = "SELECT id, question from question_titles";
$questionTitleResult = pg_query($conn, $questionTitleSelect);
$questionTitle = pg_fetch_all($questionTitleResult, PGSQL_ASSOC);

// get data duplicate questions from question_tag table 
$questionTagSelect = "SELECT questionid, tagid FROM question_tag WHERE questionid IN (
    SELECT questionid
    FROM question_tag
    GROUP BY questionid
    HAVING COUNT(distinct tagid) > 1
)";
$questionTagResult = pg_query($conn, $questionTagSelect);
$questionTags = pg_fetch_all($questionTagResult, PGSQL_ASSOC);

// print_r($questionTags);

$qObj = array();
// $qObj = array(55 => [2, 3], 41 => [1, 4]);

foreach($questionTags as $questiontag) {
  $qid = $questiontag['questionid'];
  $tid = $questiontag['tagid'];

  // print_r($questiontag);
  // print_r($qid);
  // print_r($qid);
  // print_r(array_keys($questionTags));


  // $qid = 72;
  // $tid = 1;

  $key = array_key_exists($qid, $qObj);
  // print_r(in_array($tid, $qObj[$qid]));
  
  // echo "line 31"; 

  
  if (!$qObj[$qid]) {

    array_push($qObj, array($qid => $tid));
    print_r($qObj);
    echo "working";

  } else {
    echo "not working";
  }
  
  // else if (!in_array($tid, $qObj[$qid])) {

  // } 
  
  // else if ($key && !in_array($tid, $qObj[$qid])) {
  //   array_push($qObj[$qid], $tid);
  //   print_r($qObj);
  //   echo 'no';
  // }

 
  
  
  //how to select row pairings? i.e. question + correct tag?
  // we need to seperate the array values and then 

  //if the question already exist, then dont reprint the question. If the question exist, then find all the following
  //tags that match with the question.

  //$questiontag = Array ([questionid] => 72 [tagid] => 1) its both the questionid and tagid
  // print_r($questiontag);
}

//question_tag data should be the tagid and questionid column

?>


<html>
  <head>
    <title>[object SVGSymbolElement]</title>
    <!-- <link rel="stylesheet" href="homepageStyles.css"/> -->
    <link rel="stylesheet" href="question.css"/>
    <link rel="import" href="ask.php"/>
  </head>
  <body></body>
  <center>
    <h1>AnQ</h1>
    <div class="search">
      <input type="text" id="searchValue" placeholder="Search.."/>
    </div>
    <div class="container">
      <div class="vertical-center">
        <div class="topnav"> <a class="active" href="/">Home</a><a href="tag.php">Tags </a><a href="ask.php">Ask </a><a href="question.php">Questions</a></div>
      </div>
    </div>
    <div class="question-text">
      <section>
        <?php //we will have to retireve the quesiton data and put it into the h1 tag below. Also, we'll have to create a foreach loop
        //so we don't have to create each question individually.

        // how to put correct tag and question together?
        // We search through the question_tag table and find related questionId's ane their tagId. We then search the question_titles 
        // table to obtain the actual question data bc the question_tag table will only return the ids. Do the same for the
        // tagIds. After, we display the contents of the question + tag into some sort of box.

        //question_tag foreach loop

          //since its in a foreach loop, how is it going to work if 
          
        
        
        //1. obtain question and tag data from the database
        //2. create a foreach loop
        //3. iterate over each question in the table until there are no more questions left
        //4. Set question into h1 heading so the title can be dynamic
        //5. Figure out how to do an expand so there isn't soo much text on screen
        //6. have an answer input form at the bottom of each expanded question
        //7. Display answers in the p tag with foreach loop to make answers dynamic if the answer is linked to the question
        //8. Maybe look up how to make a comment section?
        //9. Fix css to make it look fancy

        ?>
          <h1> Random Stuff </h1>
          <p id="output">It's Empty in Here.. </p>
      </section>
    </div>
  </center>
</html>