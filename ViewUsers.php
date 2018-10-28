<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "i229y416", "kei3aeTh", "i229y416");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
/* MAKE THE USER_ID BE FOR USERNAMES CHARACTERS NOT AN AUTO INCREMENT INT**/
$query = "SELECT * FROM Users";

echo "<table><tr><th>user_id</th></tr>";
if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        //printf ("%s\n", $row["user_id"]);
        $user_id = $row["user_id"];
        echo ("<tr><td>" . $user_id . "</td></tr>");
    }
     /*free result set*/ 
    $result->free();
} else {
  echo "Query failed";
}
echo "</table>";

/* close connection */
$mysqli->close();
 ?>