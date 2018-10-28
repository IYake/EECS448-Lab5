<?php 
$_UN = $_POST["UN"];

$mysqli = new mysqli("mysql.eecs.ku.edu", "i229y416", "kei3aeTh", "i229y416");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
/* MAKE THE USER_ID BE FOR USERNAMES CHARACTERS NOT AN AUTO INCREMENT INT**/
$query = "INSERT INTO Users (user_id) VALUES ('$_UN')";

if ($result = $mysqli->query($query)) {
    
    echo "User created.";
    $result->free();
} else {
  echo "User not created because either the text field is empty or that username is taken.";
}

/* close connection */
$mysqli->close();
 ?>