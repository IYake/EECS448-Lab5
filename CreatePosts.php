<?php 
$_UN = $_POST["UN"];
$_post = $_POST["post"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "i229y416", "kei3aeTh", "i229y416");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
/* MAKE THE USER_ID BE FOR USERNAMES CHARACTERS NOT AN AUTO INCREMENT INT**/
$query = "INSERT INTO Posts (content, author_id) VALUES ('$_post', '$_UN')";
$query2 = "SELECT user_id FROM Users WHERE user_id='$_UN'";

if ($result2 = $mysqli->query($query2)) {
    /* fetch associative array */

    //if the query is not an empty set, i.e., the username is found
    if ($row = $result2->fetch_assoc()) {
        //store post if user is an existing valid one and post is not empty
        if ($_post != ""){
          $result = $mysqli->query($query);
          echo "Post was saved.";
        } else {
          echo "Post was not saved because it has no text.";
        }
        
    } else{
      echo "Post was not saved because it was not written by an existing user.";
    }
     /*free result set*/ 
    $result2->free();
}

/* close connection */
$mysqli->close();
 ?>